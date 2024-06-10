<?php

namespace App\Services;

use App\Models\Faculty;
use App\Models\Schedule;
use App\Models\TimeSlot;

class ScheduleService
{
    public function createSchedule(array $data, $currentSemester, $currentYear)
    {
        if (isset($data['day']) && isset($data['classroom_id'])) {
            //check if DAY, ROOM, TIME already exists
            $constraintResult = $this->checkScheduleConstraint($data, $currentSemester);
            if ($constraintResult['check'] == 'error') {
                return ['success' => false, 'message' => 'Schedule conflict found with scheduleID:00' . $constraintResult['schedule_id']];
            }
        }

        if (isset($data['faculty_id'])) {
            $constraintResult = $this->checkFacultyScheduleConstraint($data, $currentSemester);
            if ($constraintResult['check'] == 'error') {
                return ['success' => false, 'message' => 'Faculty already has a schedule for the time slot'];
            }
        }

        $data['day'] = isset($data['day']) ? implode($data['day']) : '';

        $data['semesters_id'] = $currentSemester;
        $data['sy_id'] = $currentYear;

        // Create schedule and update time slot
        $schedule = Schedule::create($data);
        $schedule->time_slots->first->update($data);

        return ['success' => true, 'message' => 'New schedule added!'];
    }

    public function updateSchedule(array $data, $id, $currentSemester)
    {
        //Temporarily nulls the current day to avoid update confilct
        $schedule = Schedule::findOrFail($id);
        $originalDay = unserialize(serialize($schedule->day));
        $schedule->day = '';
        
        $schedule->save();
        
        if (isset($data['day']) && isset($data['classroom_id'])) {
            //check if DAY, ROOM, TIME already exists
            $constraintResult = $this->checkScheduleConstraint($data, $currentSemester);
            if ($constraintResult['check'] == 'error') {
                $schedule->day = $originalDay;
                $schedule->save();
                return ['success' => false, 'message' => 'Schedule conflict found with scheduleID:00' . $constraintResult['schedule_id']];
            }
        }

        if (isset($data['faculty_id'])) {
            $constraintResult = $this->checkFacultyScheduleConstraint($data, $currentSemester);
            if ($constraintResult['check'] == 'error') {
                $schedule->day = $originalDay;
                $schedule->save();
                return ['success' => false, 'message' => 'Faculty already has a schedule for the time slot'];
            }
        }

        $data['day'] = isset($data['day']) ? implode($data['day']) : '';

        $schedule->update($data);
        $schedule->time_slots->first->update($data);

        return ['success' => true, 'message' => 'Schedule updated!'];
    }


    public function checkScheduleConstraint(array $scheduleInputs, $currentSemester)
    {
        $days = $scheduleInputs['day'];
        $classroom_id = $scheduleInputs['classroom_id'];
        $time_start = $scheduleInputs['time_start'];
        $time_end = $scheduleInputs['time_end'];

        //loop through each day
        foreach ($days as $day) {
            $schedules = Schedule::where('classroom_id', '=', $classroom_id)
                ->where('day', 'LIKE', '%' . $day . '%')->where('semesters_id', '=', $currentSemester)->with('time_slots')->get();
            foreach ($schedules as $schedule) {
                //gets the time_slot for the schedule
                $time_slots = TimeSlot::where('schedule_id', '=', $schedule->id)->get();
                
                foreach ($time_slots as $time_slot) {
                    //check if the new time_slot is in between existing time_slot 
                    if ($time_slot->checkDatabaseTimeEquals($time_start, $time_end)) {
                        return $this->buildErrorResponse($schedule, $time_slot, $days);
                    }
                }
            }
        }

        //If no existing records found
        return ['check' => 'noError'];
    }

    public function checkFacultyScheduleConstraint(array $data, string $currentSemester): array
    {
        $days = $data['day'];
        $time_start = $data['time_start'];
        $time_end = $data['time_end'];

        $faculty = Faculty::find($data['faculty_id']);

        foreach ($days as $day) {
            $schedules = $faculty->schedules()->where('day', 'LIKE', '%' . $day . '%')->get();

            foreach ($schedules as $schedule) {
                //gets the time_slot for the schedule
                $time_slots = TimeSlot::where('schedule_id', '=', $schedule->id)->get();

                foreach ($time_slots as $time_slot) {
                    //check if the new time_slot is in between existing time_slot 
                    if ($time_slot->checkTimeEquals($time_start, $time_end)) {
                        return $this->buildErrorResponse($schedule, $time_slot, $days);
                    }
                }
            }
        }
        return ['check' => 'noError'];
    }

    /**
     * Build the error response array.
     */
    private function buildErrorResponse($schedule, $time_slot, $days): array
    {
        return [
            'check' => 'error',
            'schedule_id' => $schedule->id,
            'faculty' => $schedule->faculty_id,
            'day' => implode(',', $days),
            'time_start' => $time_slot->time_start,
            'time_end' => $time_slot->time_end,
        ];
    }

}

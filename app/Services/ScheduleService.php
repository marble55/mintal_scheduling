<?php

namespace App\Services;

use App\Models\Faculty;
use App\Models\Schedule;
use App\Models\TimeSlot;
use Illuminate\Database\Eloquent\Collection;

class ScheduleService
{
    public function createSchedule(array $data, $currentSemester, $currentYear)
    {
            
        if (isset($data['day']) && isset($data['classroom_id'])) {
            //check if DAY, ROOM, TIME already exists
            $constraintResult = $this->checkScheduleConstraint($data, $currentSemester);
            if ($constraintResult['check'] == 'error') {
                return ['success' => false, 'message' => 'Schedule conflict found with scheduleID:00'.$constraintResult['schedule_id']];
            }//'Schedule conflict found with scheduleID:00'.$result['schedule_id']

            $constraintResult = $this->checkFacultyScheduleConstraint($data, $currentSemester);
            if ($constraintResult['check'] == 'error') {
                return ['success' => false, 'message' => 'Faculty already has a schedule for the time slot'];
            }

            // For converting day[] into a single string
        }

        if (isset($data['day']))
            $data['day'] = implode($data['day']);
        else
            $data['day'] = '';

        $data['semesters_id'] = $currentSemester;
        $data['sy_id'] = $currentYear;

        // dd($data);
        // dd($data);
        // Create schedule and update time slot
        $schedule = Schedule::create($data);
        $schedule->time_slots->first->update($data);

        return ['success' => true, 'message' => 'New schedule added!'];
    }

    public function updateSchedule(array $data, $id, $currentSemester)
    {
        if (isset($data['day']) && isset($data['classroom_id'])) {
            //check if DAY, ROOM, TIME already exists
            $constraintResult = $this->checkScheduleConstraint($data, $currentSemester);
            if ($constraintResult['check'] == 'error') {
                return ['success' => false, 'message' => 'Schedule conflict found with scheduleID:00'.$constraintResult['schedule_id']];
            }//'Schedule conflict found with scheduleID:00'.$result['schedule_id']

            $constraintResult = $this->checkFacultyScheduleConstraint($data, $currentSemester);
            if ($constraintResult['check'] == 'error') {
                return ['success' => false, 'message' => 'Schedule conflict found for faculty'];
            }
        }

        // For converting day[] into a single string
        if (isset($data['day']))
            $data['day'] = implode($data['day']);
        else
            $data['day'] = '';
        $schedule = Schedule::findOrFail($id);

        $schedule->update($data);
        $schedule->time_slots->first->update($data);

        return ['success' => true, 'message' => 'Schedule updated!'];
    }


    public function checkScheduleConstraint(array $scheduleInputs, $currentSemester ,Collection $schedulesByFaculty = null)
    {
        $days = $scheduleInputs['day'];
        $classroom_id = $scheduleInputs['classroom_id'];
        $time_start = $scheduleInputs['time_start'];
        $time_end = $scheduleInputs['time_end'];

        //loop through each day
        foreach ($days as $day) {

            //gets the data with the day
            $schedules = $schedulesByFaculty ?? Schedule::where('classroom_id', '=', $classroom_id)
                ->where('day', 'LIKE', '%' . $day . '%')->where('semesters_id', '=' , $currentSemester)->with('time_slots')->get();

            foreach ($schedules as $schedule) {
                //gets the time_slot for the schedule
                $scheduleID = $schedule->getAttribute('id');
                $time_slots = TimeSlot::where('schedule_id', '=', $scheduleID)->get();

                foreach ($time_slots as $time_slot) {
                    //check if the new time_slot is in between existing time_slot 

                    if ($time_slot->checkTimeEquals($time_start, $time_end)) {
                        return [
                            'check' => 'error',
                            'schedule_id' => $scheduleID,
                            'faculty' => $schedule->faculty_id,
                            'classroom' => $classroom_id,
                            'day' => $day,
                            'time_start' => $time_slot->time_start,
                            'time_end' => $time_slot->time_end,
                        ];
                    }
                }
            }
        }
        //If no existing records found
        return ['check' => 'noError'];
    }

    public function checkFacultyScheduleConstraint(array $data, $currentSemester)
    {
        $days = $data['day'];
        $time_start = $data['time_start'];
        $time_end = $data['time_end'];

        $faculty = Faculty::findOrFail($data['faculty_id']);
        
        foreach($days as $day){
            $schedules = $faculty->schedules()->where('day', 'LIKE', '%' . $day . '%')->get();

            foreach ($schedules as $schedule) {
                //gets the time_slot for the schedule
                $scheduleID = $schedule->getAttribute('id');

                $time_slots = TimeSlot::where('schedule_id', '=', $scheduleID)->get();

                foreach ($time_slots as $time_slot) {
                    //check if the new time_slot is in between existing time_slot 
                    $oldTS = $time_slot->time_start;
                    $oldTE = $time_slot->time_end;

                    if ($time_slot->checkSpecificTimeEquals($oldTS, $oldTE, $time_start, $time_end)) {
                        return [
                            'check' => 'error',
                            'schedule_id' => $scheduleID,
                            'faculty' => $schedule->faculty_id,
                            'day' => $day,
                            'time_start' => $time_slot->time_start,
                            'time_end' => $time_slot->time_end,
                        ];
                    }
                }
            }
        }

        return ['check' => 'noError'];
    }

}

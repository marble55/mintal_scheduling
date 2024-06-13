<table class="table table-bordered table-striped border-dark" style="width:100%;">
    <div>
        <tr>
            <th colspan="9"
                style="border-top: 2px solid black; background-color:yellow; font-size:20px; text-align:center;">
                Tentative Faculty Loading Summary
            </th>
        </tr>
        <tr>
            <th class="acdemic_year" colspan="9"
                style="border-bottom: 2px solid black; background-color:yellow; font-size:14px; text-align:center;">
                {{ 'SY: ' . $school_year . ' - ' . $semester }}
            </th>
        </tr>
        <tr> <th colspan="9"></th> </tr>
    </div>
</table>

{{-- ---Regular Faculties--- --}}
<table>
    <div>
        <tr>
            <th colspan="9"
                style="border-top: 2px solid black; background-color:red; font-size:20px; text-align:center; color:whitesmoke">
                Regular Faculty
            </th>
        </tr>
        <tr> <th colspan="9"></th> </tr>
    </div>
    @foreach ($facultiesRegular as $faculty)
        <div>
            <thead>
                <tr class="faculty_name">
                    <th colspan="9"
                        style="border: 2px solid black; background-color:brown; color:whitesmoke; font-size:18px; text-align:center;">
                        {{ $faculty->first_name . ' ' . $faculty->last_name }} @if ($faculty->remarks)({{ $faculty->remarks }}) @endif
                    </th>
                </tr>
                <tr>
                    <th rowspan="2" style="border: 2px solid black; background-color:lightpink; font-size:14px;">
                        SubjectCode
                    </th>
                    <th rowspan="2" style="border: 2px solid black; background-color:lightpink; font-size:14px;">
                        Description
                    </th>
                    <th rowspan="2" style="border: 2px solid black; background-color:lightpink; font-size:14px;">
                        YR/Block
                    </th>
                    <th colspan="2" style="border: 2px solid black; background-color:lightpink; font-size:14px;">
                        Unit
                    </th>
                    <th colspan="3" style="border: 2px solid black; background-color:lightpink; font-size:14px;">
                        Schedule
                    </th>
                    <th rowspan="2" style="border: 2px solid black; background-color:lightpink; font-size:14px;">
                        Faculty Load
                    </th>
                </tr>
                <tr>
                    <th style="border: 2px solid black; background-color:lightpink;">Lec</th>
                    <th style="border: 2px solid black; background-color:lightpink;">Lab</th>
                    <th style="border: 2px solid black; background-color:lightpink;">DAY</th>
                    <th style="border: 2px solid black; background-color:lightpink;">TIME</th>
                    <th style="border: 2px solid black; background-color:lightpink;">ROOM</th>
                </tr>
            </thead>
        </div>

        {{-- DATAS --}}

        <tbody>
            @foreach ($faculty->schedules as $schedule)
                <tr>
                    <td class="subject_code" style="border: 2px solid black;">{{ $schedule->subject->subject_code }}
                    </td>
                    <td class="subject description" style="border: 2px solid black;">
                        {{ $schedule->subject->description }}</td>

                    @if ($schedule->block)
                        <td class="block" style="border: 2px solid black;">{{ $schedule->block->course }}</td>
                    @else
                        <td class="block" style="border: 2px solid black;"></td>
                    @endif

                    @if ($schedule->is_lab)
                        <td class="unit_lecture" style="border: 2px solid black;"></td>
                        <td class="unit_lab" style="border: 2px solid black;">{{ $schedule->subject->units_lab ?? ' ' }}
                        </td>
                    @elseif (!$schedule->is_lab)
                        <td class="unit_lecture" style="border: 2px solid black;">
                            {{ $schedule->subject->units_lecture ?? ' ' }}</td>
                        <td class="unit_lab" style="border: 2px solid black;"></td>
                    @else
                        <td class="unit_lecture" style="border: 2px solid black;">
                            {{ $schedule->subject->units_lecture ?? ' ' }}</td>
                        <td class="unit_lab" style="border: 2px solid black;">{{ $schedule->subject->units_lab ?? ' ' }}
                        </td>
                    @endif

                    <td class="schedule_day" style="border: 2px solid black;">{{ $schedule->day_stripped ?? '' }}</td>
                    <td class="schedule_time" style="border: 2px solid black;">
                        @foreach ($schedule->time_slots as $time_slot)
                            {{ $time_slot->time_start_12hour() . ' - ' . $time_slot->time_end_12hour() }}
                        @endforeach
                    </td>
                    <td class="schedule_room" style="border: 2px solid black;">{{ $schedule->classroom->room ?? '' }}
                    </td>
                    <td class="subject_load" style="border: 2px solid black;">{{ $schedule->subject->load ?? '' }}</td>
                </tr>
            @endforeach

            {{-- ---If faculty has designation--- --}}
            @if ($faculty->designation)
                <tr>
                    <td style="border: 2px solid black;"></td>
                    <td class="faculty_designation" style="border: 2px solid black;">
                        {{ $faculty->designation ?? '' }}</td>
                    <td colspan="6"></td>
                    <td class="faculty_designation_load" style="border: 2px solid black;">
                        {{ $faculty->designation_load ?? '' }}</td>
                    <td></td>
                </tr>
            @endif

            <tr>
                <td style="border: 2px solid black;"></td>
                <td style="border: 2px solid black;">Total Load:</td>
                <td colspan="6" style="border: 2px solid black;"></td>
                <td class="total_load" style="border: 2px solid black;">{{ $faculty->total_load }}</td>
            </tr>
            <tr>
                <td colspan="9" style="border-top: 2px solid black; height:15rem">
                </td>
            </tr>
        </tbody>
    @endforeach
</table>

{{-- ---Part-Timers--- --}}
<table>
    <div>
        <tr>
            <th colspan="9"
                style="border-top: 2px solid black; background-color:blue; font-size:20px; text-align:center; color:whitesmoke">
                Part-Timers
            </th>
        </tr>
        <tr> <th colspan="9"></th> </tr>
    </div>
    @foreach ($facultiesPartTime as $faculty)
        <div>
            <thead>
                <tr class="faculty_name">
                    <th colspan="9"
                        style="border: 2px solid black; background-color:lightskyblue; color:black; font-size:18px; text-align:center;">
                        {{ $faculty->first_name . ' ' . $faculty->last_name }} @if ($faculty->remarks)({{ $faculty->remarks }}) @endif
                    </th>
                </tr>
                <tr>
                    <th rowspan="2" style="border: 2px solid black; background-color:lightskyblue; font-size:14px;">
                        SubjectCode
                    </th>
                    <th rowspan="2" style="border: 2px solid black; background-color:lightskyblue; font-size:14px;">
                        Description
                    </th>
                    <th rowspan="2" style="border: 2px solid black; background-color:lightskyblue; font-size:14px;">
                        YR/Block
                    </th>
                    <th colspan="2" style="border: 2px solid black; background-color:lightskyblue; font-size:14px;">
                        Unit
                    </th>
                    <th colspan="3" style="border: 2px solid black; background-color:lightskyblue; font-size:14px;">
                        Schedule
                    </th>
                    <th rowspan="2" style="border: 2px solid black; background-color:lightskyblue; font-size:14px;">
                        Faculty Load
                    </th>
                </tr>
                <tr>
                    <th style="border: 2px solid black; background-color:lightskyblue;">Lec</th>
                    <th style="border: 2px solid black; background-color:lightskyblue;">Lab</th>
                    <th style="border: 2px solid black; background-color:lightskyblue;">DAY</th>
                    <th style="border: 2px solid black; background-color:lightskyblue;">TIME</th>
                    <th style="border: 2px solid black; background-color:lightskyblue;">ROOM</th>
                </tr>
            </thead>
        </div>

        {{-- DATAS --}}

        <tbody>
            @foreach ($faculty->schedules as $schedule)
                <tr>
                    <td class="subject_code" style="border: 2px solid black;">{{ $schedule->subject->subject_code }}
                    </td>
                    <td class="subject description" style="border: 2px solid black;">
                        {{ $schedule->subject->description }}</td>

                    @if ($schedule->block)
                        <td class="block" style="border: 2px solid black;">{{ $schedule->block->course }}</td>
                    @else
                        <td class="block" style="border: 2px solid black;"></td>
                    @endif

                    @if ($schedule->is_lab)
                        <td class="unit_lecture" style="border: 2px solid black;"></td>
                        <td class="unit_lab" style="border: 2px solid black;">{{ $schedule->subject->units_lab ?? ' ' }}
                        </td>
                    @elseif (!$schedule->is_lab)
                        <td class="unit_lecture" style="border: 2px solid black;">
                            {{ $schedule->subject->units_lecture ?? ' ' }}</td>
                        <td class="unit_lab" style="border: 2px solid black;"></td>
                    @else
                        <td class="unit_lecture" style="border: 2px solid black;">
                            {{ $schedule->subject->units_lecture ?? ' ' }}</td>
                        <td class="unit_lab" style="border: 2px solid black;">{{ $schedule->subject->units_lab ?? ' ' }}
                        </td>
                    @endif

                    <td class="schedule_day" style="border: 2px solid black;">{{ $schedule->day_stripped ?? '' }}</td>
                    <td class="schedule_time" style="border: 2px solid black;">
                        @foreach ($schedule->time_slots as $time_slot)
                            {{ $time_slot->time_start_12hour() . ' - ' . $time_slot->time_end_12hour() }}
                        @endforeach
                    </td>
                    <td class="schedule_room" style="border: 2px solid black;">{{ $schedule->classroom->room ?? '' }}
                    </td>
                    <td class="subject_load" style="border: 2px solid black;">{{ $schedule->subject->load ?? '' }}</td>
                </tr>
            @endforeach

            {{-- ---If faculty has designation--- --}}
            @if ($faculty->designation)
                <tr>
                    <td style="border: 2px solid black;"></td>
                    <td class="faculty_designation" style="border: 2px solid black;">
                        {{ $faculty->designation ?? '' }}</td>
                    <td colspan="6"></td>
                    <td class="faculty_designation_load" style="border: 2px solid black;">
                        {{ $faculty->designation_load ?? '' }}</td>
                    <td></td>
                </tr>
            @endif

            <tr>
                <td style="border: 2px solid black;"></td>
                <td style="border: 2px solid black;">Total Load:</td>
                <td colspan="6" style="border: 2px solid black;"></td>
                <td class="total_load" style="border: 2px solid black;">{{ $faculty->total_load }}</td>
            </tr>
            <tr>
                <td colspan="9" style="border-top: 2px solid black; height:15rem">
                </td>
            </tr>
        </tbody>
    @endforeach
</table>

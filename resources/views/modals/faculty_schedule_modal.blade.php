@push('styles')
    <style>
        .modal-dialog {
            max-width: 100%;
            width: auto !important;
            margin: 0;
        }

        .modal-content {
            height: auto;
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-body {
            max-height: calc(100vh - 210px);
            overflow-y: auto;
        }
    </style>
@endpush

<div class="modal fade w-100" id="addScheduleModal" tabindex="-1" aria-labelledby="addScheduleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="width:125%; right:5rem;">
            <div class="modal-header">
                <h5 class="modal-title" id="addScheduleModalLabel">Add Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Your form content goes here -->
                <div class="container pt-5">
                    <form id="assign-schedule" action="{{ route('facultySchedule.update', $faculty->id) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Table for displaying schedules -->
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Add</th>
                                    <th>Sub-Code</th>
                                    <th>Description</th>
                                    <th>YR/Block</th>
                                    <th>Unit</th>
                                    <th>Day</th>
                                    <th>Time</th>
                                    <th>Room</th>
                                    <th>Load</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedules as $schedule)
                                    <tr>
                                        <td>
                                            @if ($schedule->faculty)
                                                <input class="form-check-input border-maroon" type="checkbox"
                                                    name="schedules[{{ $schedule->id }}]" id="schedule_checkbox"
                                                    disabled>
                                                <label class="form-check-label" for="schedule_checkbox">Assigned ({{ $schedule->faculty->first_name.' '.$schedule->faculty->last_name }})</label>
                                            @else
                                            <br><input class="form-check-input border-maroon" type="checkbox" name="schedules[{{ $schedule->id }}]" id="schedule_checkbox">
                                            @endif
                                        </td>
                                        <td>{{ $schedule->subject->subject_code }}</td>
                                        <td>{{ $schedule->subject->description }}</td>
                                        <td>{{ $schedule->block->course ?? ' '}} {{ $schedule->block->section ?? '' }}</td>
                                        <td>{{ $schedule->is_lab ? 'LAB' : 'LEC' }}</td>
                                        <td>{{ $schedule->day }}</td>
                                        <td>
                                            @foreach ($schedule->time_slots as $time_slot)
                                                {{ $time_slot->time_start_12hour() }} - <br>
                                                {{ $time_slot->time_end_12hour() }}
                                            @endforeach
                                        </td>
                                        <td>{{ $schedule->classroom->room ?? '' }} {{ $schedule->classroom->building ?? '' }}</td>
                                        <td>{{ $schedule->subject->load ?? '' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="submitForm()">Add Schedule</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function submitForm() {
            document.getElementById('assign-schedule').submit();
        }
    </script>
@endpush

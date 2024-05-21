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

<div class="modal fade" id="addScheduleModal" tabindex="-1" aria-labelledby="addScheduleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addScheduleModalLabel">Add Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Your form content goes here -->

                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_length" id="example_length"><label>Show <select name="example_length"
                                    aria-controls="example" class="form-select form-select-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select> entries</label></div>
                        <div class="dt-buttons btn-group flex-wrap"> <button
                                class="btn btn-secondary buttons-copy buttons-html5" tabindex="0"
                                aria-controls="example" type="button"><span>Copy</span></button> <button
                                class="btn btn-secondary buttons-csv buttons-html5" tabindex="0"
                                aria-controls="example" type="button"><span>CSV</span></button> <button
                                class="btn btn-secondary buttons-excel buttons-html5" tabindex="0"
                                aria-controls="example" type="button"><span>Excel</span></button> <button
                                class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0"
                                aria-controls="example" type="button"><span>PDF</span></button> <button
                                class="btn btn-secondary buttons-print" tabindex="0" aria-controls="example"
                                type="button"><span>Print</span></button> </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div id="example_filter" class="dataTables_filter"><label>Search:<input type="search"
                                    class="form-control form-control-sm" placeholder="" aria-controls="example"></label>
                        </div>
                    </div>
                </div>

                <div class="container pt-5">
                    <form action="{{ route('schedule.store') }}" method="POST">
                        @csrf
                        <!-- Table for displaying schedules -->
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sched ID</th>
                                    <th>Day</th>
                                    <th>Time Slot</th>
                                    <th>Subject ID</th>
                                    <th>Is Lab?</th>
                                    <th>Class ID</th>
                                    <th>Block ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedules as $schedule)
                                    <tr>
                                        <td>{{ $schedule->id }}</td>
                                        <td>{{ $schedule->day }}</td>
                                        <td>
                                            @foreach ($schedule->time_slots as $time_slot)
                                                {{ $time_slot->time_start . '-' . $time_slot->time_end }}
                                            @endforeach
                                        </td>
                                        <td>{{ $schedule->subject->subject_code }}</td>
                                        <td>{{ $schedule->is_lab ? 'Yes' : 'No' }}</td>
                                        <td>{{ $schedule->classroom->room }}</td>
                                        <td>{{ $schedule->block->section }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

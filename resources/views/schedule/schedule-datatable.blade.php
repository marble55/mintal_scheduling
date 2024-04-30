@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="data_table">
                <table id="example" class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Sched ID</th>
                            <th>Day</th>
                            <th>Time Start</th>
                            <th>Time End</th>
                            <th>Class ID</th>
                            <th>Subject ID</th>
                            <th>Block ID</th>
                            <th>Faculty ID</th>
                            <th>School Year</th>
                            <th>Semester</th>
                            <th>Lab</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>202401</td>
                            <td>Tuesday</td>
                            <td>8:00 AM</td>
                            <td>10:00 AM</td>
                            <td>201</td>
                            <td>216</td>
                            <td>0202</td>
                            <td>202201455</td>
                            <td>2024</td>
                            <td>2nd</td>
                            <td>203</td>
                            
                            <td><a href="?page=graduate">Edit | </a>
                            <a href="?page=graduate">Delete</a></td>
                        </tr>
                        <tr>
                            <td>202402</td>
                            <td>Tuesday</td>
                            <td>10:00 AM</td>
                            <td>12:00 PM</td>
                            <td>202</td>
                            <td>217</td>
                            <td>0101</td>
                            <td>202201456</td>
                            <td>2024</td>
                            <td>2nd</td>
                            <td>301</td>
                            
                            <td><a href="?page=graduate">Edit | </a>
                            <a href="?page=graduate">Delete</a></td>
                        </tr>
                        <tr>
                            <td>202402</td>
                            <td>Tuesday</td>
                            <td>01:00 PM</td>
                            <td>03:00 PM</td>
                            <td>202</td>
                            <td>218</td>
                            <td>0301</td>
                            <td>202201457</td>
                            <td>2024</td>
                            <td>2nd</td>
                            <td>306</td>
                            
                            <td><a href="?page=graduate">Edit | </a>
                            <a href="?page=graduate">Delete</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

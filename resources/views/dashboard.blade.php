@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">

                <!-- Icon Cards-->
                <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
                    <div class="inforide">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-4 col-4 rideone">
                                <i class="lni lni-calendar"></i>
                            </div>
                            <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                                <h4>Schedule</h4>
                                <h2>03</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
                    <div class="inforide">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-4 col-4 ridetwo">
                                <i class="lni lni-users"></i>
                            </div>
                            <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                                <h4>Faculty</h4>
                                <h2>05</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
                    <div class="inforide">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-4 col-4 ridethree">
                                <i class="lni lni-school-bench"></i>
                            </div>
                            <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                                <h4>Vacant Room</h4>
                                <h2>50</h2>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@extends('layouts.user.userdashboard')

@section('title', 'Activity Logs')

@section('content')

    {{-- CONTAINER --}}
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover activitylog_dt">
                                <caption>Activity Logs <i class="fas fa-history ms-1"></i> </caption>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Activity</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Display User's Activity Log --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End CONTAINER --}}

@endsection

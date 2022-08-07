@extends('layouts.admin.admindashboard')

@section('title', 'Admin | Manage Resident')

@section('content')

    {{-- CONTAINER --}}
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <a class=" float-end btn btn-sm btn_green rounded me-3" href="javascript:void(0)"
                            onclick="createResident('#m_resident', '.resident_form', ['#m_resident_title','Add Resident'], ['.btn_add_resident','.btn_update_resident'], {rname:'city_admin.resident.create', target:'#d_barangay'})">Add
                            Resident +</a><br>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered resident_dt py-3">
                                <caption>List of Residents <i class="fas fa-users ms-1"></i> </caption>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Last Name</th>
                                        <th>Gender</th>
                                        <th>Address</th>
                                        <th>Barangay</th>
                                        <th>Contact</th>
                                        <th>Email</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Display List of Residents --}}
                                </tbody>
                            </table>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End CONTAINER --}}

@endsection

@extends('layouts.admin.admindashboard')

@section('title', 'Manage Profile')

@section('content')

    {{-- CONTAINER --}}
    <div class="container">
        <br><br>
        <div class="row justify-content-center align-items-center">
            <form action="{{ route('city_admin.profile.update', auth()->id()) }}" method="POST" class="col-md-6 bg-white p-5">
                @csrf @method('PUT')

                <img src="{{ handleNullAvatar(auth()->user()->user_avatar) }}"
                    class="img-fluid rounded-circle d-block mx-auto" width='140' alt="">

                <br>
                @include('layouts.alert')
                <div class="form-group mb-2">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
                </div>
                <div class="form-group mb-2">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" value="{{ auth()->user()->email }}" readonly>
                </div>
                <div class="form-group mb-2">
                    <label class="form-label">Current Password</label>
                    <input type="text" class="form-control"" name=" old">
                </div>

                <div class="form-group mb-2">
                    <label class="form-label">New Password</label>
                    <input type="password" class="form-control"" name=" password" placeholder="•••••••••"
                        autocomplete="new-password">
                </div>

                <div class="form-group mb-2">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control"" name=" password_confirmation" placeholder="•••••••••"
                        autocomplete="new-password">
                </div>

                <input type="file" name="avatar" id="user_image">
                <button class="btn btn_green form-control">Update Profile </button>
        </div>
    </div>
    {{-- End CONTAINER --}}

@endsection

@section('script')

    <script>
        initiateFilePond('#user_image')

        $('#profile_nav').addClass('nav-active')
    </script>

@endsection

@extends('layouts.user.userdashboard')

@section('title', 'Brgy. Admin | Edit Event')

@section('content')

    {{-- CONTAINER --}}
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <a class="btn btn_green text-decoration-none text-white"
                                    href="{{ route('brgy_admin.event.index') }}"><i class="fas fa-chevron-left me-1"></i>Go
                                    Back</a>
                                <img class="img-fluid" src="{{ asset('img/event/event.svg') }}" alt="event.svg">
                            </div>
                            <div class="col-md-6">
                                <h1 class="text-center fw-bold txt_green"> Edit Event <div class="i far fa-edit ms-1"></div>
                                </h1>
                                <br>
                                <form action="{{ route('brgy_admin.event.update', $event->id) }}" method="post">
                                    @csrf
                                    @method('PUT')

                                    @include('layouts.alert')

                                    <div class="form-group mb-2">
                                        <label class="form-label">Event Name *</label>
                                        <input class="form-control" type="text" name="name"
                                            value="{{ $event->name }}" required>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="form-label">Description *</label>
                                        <textarea class="form-control" name="description" cols="0" rows="5" value="{{ $event->description }}"
                                            required>{{ $event->description }}</textarea>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="form-label">Event Location *</label>
                                        <input class="form-control" type="text" name="location"
                                            value="{{ $event->location }}" required>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="form-label">Organizer *</label>
                                        <input class="form-control" type="text" name="organizer"
                                            value="{{ $event->organizer }}" required>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="form-label">Contact *</label>
                                        <input class="form-control" type="number" min="0" name="contact"
                                            value="{{ $event->contact }}" required>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="form-label">DateTime Start *</label>
                                        <input class="form-control" type="datetime-local" min="2021-10-01T00:00"
                                            max="2022-01-01T00:00" name="date_time_start"
                                            value="{{ formatDate($event->date_time_start, 'dateTimeLocal') }}" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-label">DateTime End *</label>
                                        <input class="form-control" type="datetime-local" min="2021-10-01T00:00"
                                            max="2022-01-01T00:00" name="date_time_end"
                                            value="{{ formatDate($event->date_time_end, 'dateTimeLocal') }}" required>
                                        <div class="form-text txt_green">Note* Please double check the schedule before
                                            encoding</div>
                                    </div>
                                    <button type="submit" class="btn btn_green float-end">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End CONTAINER --}}

@endsection

@section('script')
    <script>
        $(() => {
            $('#d_barangay').select2()

            $("#manage_health_program_nav").addClass("nav-active");

        })
    </script>
@endsection

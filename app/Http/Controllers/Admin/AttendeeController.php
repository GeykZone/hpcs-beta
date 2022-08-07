<?php

namespace App\Http\Controllers\Admin;

use App\Mail\NotifyAttendee;
use Illuminate\Http\Request;
use App\Models\Admin\Attendee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Shared\Attendee\AttendeeRequest;

class AttendeeController extends Controller
{
    public function store(AttendeeRequest $request)
    {
        $attendee = Attendee::create($request->validated());

        Mail::to($attendee->email)->send(new NotifyAttendee($attendee->load('event')));

        $this->log_activity($attendee, 'added', 'Attendee', $attendee->full_name );

        return $this->res(['result' => $attendee]);
    }

    public function update(AttendeeRequest $request, Attendee $attendee)
    {
        $attendee->update($request->validated());

        return $this->res(['result' => $attendee]);

    }

    public function destroy(Attendee $attendee)
    {
        $attendee->delete();

        return $this->res(['message' => 'Attendee Deleted Successfully']);
    }
}

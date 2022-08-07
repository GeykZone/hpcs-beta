{{-- blade-formatter-disable --}}
@component('mail::message')

Good Day! {{ $attendee->full_name }},

There is an upcoming healthcare program from your barangay and you are invited to participate the event. <br>
@component('mail::panel')
Event: <span class='text-capitalize'>{{ $attendee->event->name }}</span> <br>
Details: <span class='text-capitalize'>{{ $attendee->event->description }}</span> <br>
Location: <span class='text-capitalize'>{{ $attendee->event->location }}</span><br>
Organizer: <span class='text-capitalize'>{{ $attendee->event->organizer }}</span> <br>
Schedule: {{ formatDate($attendee->event->date_time_start, 'fulldate') }} at  {{ formatDate($attendee->event->date_time_start, 'time') }} -  {{ formatDate($attendee->event->date_time_end, 'time') }} <br>
@endcomponent   
Any Questions? You can contact us at {{ $attendee->event->contact }} | email @ healthcareoroqueita@gmail.com

Thanks,<br>
{{ config('app.name') }}
@endcomponent

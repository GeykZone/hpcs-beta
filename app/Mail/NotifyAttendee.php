<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyAttendee extends Mailable
{
    use Queueable, SerializesModels;

    public $attendee;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($attendee)
    {
        $this->attendee = $attendee;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), 'Oroqueita Healthcare')
                    ->subject('Oroqueita Healthcare - Health Program Update')
                    ->markdown('emails.notify_attendee', [
                        'attendee' => $this->attendee,

        ]); // with params
    }
}

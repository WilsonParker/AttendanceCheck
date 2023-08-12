<?php

namespace App\Mail;

use App\Services\Attendance\Contracts\AttendanceMailContract;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OnAttended extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @param array<AttendanceMailContract> $contracts
     */
    public function __construct(public array $contracts) {}

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.attendance.result');
    }
}

<?php

namespace App\Mail;

use App\Services\Attendance\Contracts\AttendanceContract;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OnAttended extends Mailable
{
    use Queueable, SerializesModels;

    public AttendanceContract $contract;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(AttendanceContract $contract, $data)
    {
        $this->data = $data;
        $this->contract = $contract;
    }

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

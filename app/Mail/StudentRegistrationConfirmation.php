<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentRegistrationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $student_number;
    public $password;

    public function __construct($student_number, $password)
    {
        $this->student_number = $student_number;
        $this->password = $password;
    }

    public function build()
    {
        return $this->view('emails.registration_account')
            ->subject('Congrats! This is your account')
            ->with([
                'student_number' => $this->student_number,
                'password' => $this->password,
            ]);
    }
}

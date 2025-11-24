<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $otp;

    /**
     * @param string $otp
     */
    public function __construct(string $otp)
    {
        $this->otp = $otp;
    }

    public function build(): OtpMail
    {
        return $this->subject('Your OTP Code')
            ->view('emails.otp')
            ->with(['otp' => $this->otp]);
    }
}

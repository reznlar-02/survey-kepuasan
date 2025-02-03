<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    public $kunjungan;

    /**
     * Create a new message instance.
     *
     * @param $kunjungan
     */
    public function __construct($kunjungan)
    {
        $this->kunjungan = $kunjungan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Verifikasi Email Anda')
            ->view('emails.verification')
            ->with([
                'nama' => $this->kunjungan->nama,
                'verificationLink' => route('kunjungan.verify', $this->kunjungan->email),
            ]);
    }
}
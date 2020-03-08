<?php

namespace App\Mail;

use App\Models\Vacation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VacationRequest extends Mailable
{
    use Queueable, SerializesModels;
    private $vacation;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->user_id = $user_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('ユーザー登録がありました')
            ->view('emails.auth.registered')
            ->with('user', $this->user);
    }
}

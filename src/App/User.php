<?php

namespace App;

class User
{
    public $email;
    protected Mailer $mailer;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function setMailer($mailer) {
        $this->mailer = $mailer;
    }

    public function notify(string $message): bool
    {
        return $this->mailer::send($this->email, $message);
    }

    public function notifyStatic(string $message): bool
    {
        return Mailer::send($this->email, $message);
    }

}
<?php

namespace App;

class User
{
    public $email;
    protected Mailer $mailer;
    protected $mailer_callable;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function setMailer($mailer) {
        $this->mailer = $mailer;
    }

    public function setMailerCallable($mailer_callable) {
        $this->mailer_callable = $mailer_callable;
    }

    public function notify(string $message): bool
    {
        return $this->mailer::send($this->email, $message);
    }

    public function notifyStatic(string $message): bool
    {
        return Mailer::send($this->email, $message);
    }

    public function notifyStaticCallable(string $message): bool
    {
        return call_user_func([Mailer::class, 'send'], $this->email, $message);
    }

    public function notifyStaticCallableWithInjection(string $message): bool
    {
        return call_user_func($this->mailer_callable, $this->email, $message);
    }

}
<?php

namespace App;


use InvalidArgumentException;

class Mailer
{
    public static function send(string $email, string $message): bool
    {
        if (empty($email)) {
            throw new InvalidArgumentException();
        }
        echo $email.' '.$message;
        return true;
    }
}
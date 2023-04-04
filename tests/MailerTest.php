<?php

namespace App\tests;

use App\Mailer;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class MailerTest extends TestCase
{
    public function testSendMessageReturnsTrue() {
        $this->assertTrue(Mailer::send('mzphp@example.com', 'Hello'));
    }

    public function testInvalidArgumentException() {
        $this->expectException(InvalidArgumentException::class);
        Mailer::send('', '');
    }
}

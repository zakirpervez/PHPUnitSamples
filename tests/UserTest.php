<?php

namespace App;

use Mockery;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    public function testNotifyReturnTrue()
    {
        $user = new User('mz@example.com');
        $mailer = new Mailer();
        $user->setMailer($mailer);
        $this->assertTrue($user->notify('Hello'));
    }

    public function testNotifyReturnStaticTrue()
    {
        $user = new User('mz@example.com');
        $this->assertTrue($user->notifyStatic('Hello'));
    }

    public function testNotifyReturnStaticCallable()
    {
        $user = new User('mz@example.com');
        $this->assertTrue($user->notifyStaticCallable('Hello'));
    }

    public function testNotifyReturnStaticWithInjection()
    {
        $user = new User('mz@example.com');
//        $user->setMailerCallable([Mailer::class, 'send']); // method 1
        $user->setMailerCallable(function (){
            echo 'mocked';
            return true;
        } ); // method 2
        $this->assertTrue($user->notifyStaticCallableWithInjection('Hello'));
    }

    public function testNotifyWithMockery() {
        $user = new User('mz@example.com');
        $mock = Mockery::mock('alias:Mailer');
        $mock->shouldReceive('send')
        ->once()
        ->with($user->email, 'Hello')
        ->andReturn(true);
        $this->assertTrue($user->notifyStatic('Hello'));
    }
}

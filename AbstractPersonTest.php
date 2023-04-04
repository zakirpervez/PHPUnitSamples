<?php

namespace App;

use PHPUnit\Framework\TestCase;

class AbstractPersonTest extends TestCase
{
    public function testGetNameAndTitle()
    {
        $doctor = new Doctor('Jaikal');
        $this->assertEquals('Dr. Jaikal', $doctor->getNameAndTitle());
    }

    public function testNameAndTitleIncludeValueFromTitle() {
        $mock = $this->getMockBuilder(AbstractPerson::class)
            ->setConstructorArgs(['Green'])
            ->getMockForAbstractClass();

        $mock->method('getTitle')->willReturn('Dr.');
        $this->assertEquals('Dr. Green', $mock->getNameAndTitle());
    }
}

<?php

namespace App;

abstract class AbstractPerson
{
    protected string $surname;

    public function __construct(string $surname)
    {
        $this->surname = $surname;
    }

    abstract protected function getTitle();

    public function getNameAndTitle() {
        return trim($this->getTitle() .' '.$this->surname);
    }

}
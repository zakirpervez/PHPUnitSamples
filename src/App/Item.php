<?php

namespace App;

class Item
{
    public function getDescription(): string {
        return $this->getId() .  $this->getToken();
    }

    protected function getId(): int {
        return rand();
    }

    private function getToken(): string {
        return uniqid();
    }
}
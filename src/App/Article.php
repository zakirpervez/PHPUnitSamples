<?php

namespace App;

class Article
{
    /** @var $title */
    public $title;


    public function getSlug(): string {
        $slug = $this->title;
        return preg_replace('/\s+/', '_', $slug);
    }
}
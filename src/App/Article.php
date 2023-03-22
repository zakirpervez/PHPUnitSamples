<?php

namespace App;

class Article
{
    /** @var $title */
    public $title;


    public function getSlug(): string {
        $slug = $this->title;

        $slug = preg_replace('/\s+/', '_', $slug);

        $slug = preg_replace('/[^\w]+/', '', $slug);

        return trim($slug, "_");
    }
}
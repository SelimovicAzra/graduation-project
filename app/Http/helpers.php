<?php
use Illuminate\Support\Str;

    function generateSlug(string $title)
    {
        return Str::slug(html_entity_decode($title), '-');
    }


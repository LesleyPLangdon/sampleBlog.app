<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class post
{
    public static function all()
    {
        $files = File::files(resource_path("posts"));

        return array_map(function ($file) {

            return file_get_contents($file);
        }, $files);

    }

    public static function find($slug)
    {
        $path = __DIR__ . "/../resources/posts/{$slug}.html";
        //if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
        //     if (!file_exists($path = __DIR__ . "/../resources/posts/{$slug}.html")) {
        //     throw new ModelNotFoundException();
        // }

        return cache()->remember("posts.{$slug}", 1800, function() use ($path) {
            return file_get_contents($path);
        });


    }


}


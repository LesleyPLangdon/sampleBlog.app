<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class post
{
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;


    /**
     * post constructor.
     * @param $title
     * @param $excerpt
     * @param $date
     * @param $body
     * @param $slug
     */
    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }


    public static function all()
    {
        return cache()->rememberForever('posts.all', function() {
            return collect(File::files(resource_path("posts")))

                ->map(function ($file) {
                    return YamlFrontMatter::parseFile($file);
                })

                ->map(function ($document){

                    return new Post(
                        $document->title,
                        $document->excerpt,
                        $document->date,
                        $document->body(),
                        $document->slug
                    );

                })
                ->sortByDesc('date');

        });

    }

    public static function find($slug)
    {
        // of all the blog posts, find the one with a slug that matches the one that was requested

        return static::all()->firstWhere('slug', $slug);

//        //$path = __DIR__ . "/../resources/posts/{$slug}.html";
//        if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
//        //     if (!file_exists($path = __DIR__ . "/../resources/posts/{$slug}.html")) {
//           throw new ModelNotFoundException();
//       }
//
//        return cache()->remember("posts.{$slug}", 1800, function() use ($path) {
//            return file_get_contents($path);
//        });


    }


}


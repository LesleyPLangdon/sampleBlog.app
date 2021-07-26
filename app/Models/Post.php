<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //for mass assignment
    //protected $guarded = ['id']; //allows all mass assignment except id
    protected $guarded = []; //allows no mass assignment
    //protected $fillable = ['title', 'slug', 'excerpt', 'body', 'category_id']; //allows specific fields to be mass assigned

    protected $with = ['category', 'author'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

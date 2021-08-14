<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = "blog";
    protected $fillable = ['title', 'blog_slug', 'sort_description', 'description', 'absolute_link', 'image', 'image_description', 'status'];
}

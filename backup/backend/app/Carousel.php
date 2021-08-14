<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $table = 'carousel';
    protected $fillable = ['image', 'title','description','url', 'order'];
    protected $hidden = ['updated_at', 'order'];
}

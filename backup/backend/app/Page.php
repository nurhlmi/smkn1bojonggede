<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'page';
    protected $fillable = ['title', 'category_page', 'description', 'image'];

    public function params() {
        return $this->belongsTo('App\Params', 'category_page');
    }
}

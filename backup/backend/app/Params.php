<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Params extends Model
{
    protected $table = "params";
    protected $fillable = ['pid', 'category_page', 'status', 'order'];

    public function page()
    {
        return $this->hasMany('App\Page', 'category_page');
    }
}

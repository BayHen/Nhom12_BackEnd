<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $primaryKey = "product_id";

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'product_id', 'category_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'comment_id');
    }
}

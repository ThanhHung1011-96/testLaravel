<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'quantity', 'category_id', 'price'];
    public function category()
    {
        return $this->belongsTo('App\Model\Category', 'category_id');
    }
    public function images()
    {
        return $this->hasMany('App\Model\Image', 'product_id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        "title",'description','image','on_sale',
        'sold_count','rating','review_count','price'
        ];

    protected $casts = [
        "on_sale" => "boolean"
    ];

    //与商品sku表相关连
    public function sku()
    {
        return $this->hasMany(ProductSku::class);
    }
}

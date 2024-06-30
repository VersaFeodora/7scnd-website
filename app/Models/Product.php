<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'product_name',
        'product_price',
        'product_desc',
        'product_size',
        'product_color',
        'product_brand',
        'product_qty',
        'product_image',
        'product_url',
        'category_id',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}

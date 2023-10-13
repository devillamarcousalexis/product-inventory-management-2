<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tbl_product';
    protected $primaryKey = 'product_id';
    public $timestamps = true;
    protected $fillable = [
        'product_id', 'category_id', 'product_name'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}

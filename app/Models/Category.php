<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tbl_category';
    protected $primaryKey = 'category_id';
    public $timestamps = true;
    protected $fillable = [
        'category_id', 'category_name'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}

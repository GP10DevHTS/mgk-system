<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'current_stock',
        'min_stock',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class)->withTrashed();
    }
}

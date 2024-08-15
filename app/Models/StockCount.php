<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockCount extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['product_id', 'count', 'created_by'];

    public function product()
    {
        return $this->belongsTo(Product::class)->withTrashed();
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

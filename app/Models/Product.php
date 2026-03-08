<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'brand_id', 'condition_id', 'description', 'price'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }
    // sorting logic
    public function scopeSorted($query, $sort)
    {
        return match ($sort) {
            'oldest'     => $query->orderBy('created_at', 'asc'),
            'price_high' => $query->orderBy('price', 'desc'),
            'price_low'  => $query->orderBy('price', 'asc'),
            default      => $query->orderBy('created_at', 'desc'),
        };
    }
}

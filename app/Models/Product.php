<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const Available_Product = 'available';
    const UnAvailable_Product = 'unavailable';

    protected $fillable = [
        'name',
        'description',
        'quantity',
        'image',
        'status',
        'seller_id'
    ];

    public function isAvailable()
    {
        return $this->status == Product::Available_Product;
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}

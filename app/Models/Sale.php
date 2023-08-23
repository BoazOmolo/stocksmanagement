<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'product_id',
        'customername', 
        'quantity', 
        'price',
        // 'totalprice',
        'paymentmode',
        'paymentstatus',
        'date'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function getTotalPriceAttribute()
    {
        return $this->quantity * $this->price;
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot('quantity', 'price')
            ->withTimestamps(); // Optional, if you want to record timestamps in the pivot table
    }    
}

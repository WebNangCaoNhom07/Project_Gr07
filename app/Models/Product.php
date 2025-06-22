<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'selling_price',
        'actual_price',
        'ram',
        'ssd',
        'processor',
        'operating_system',
        'display_size',
        'exchange_offer',
        'image',
    ];
}

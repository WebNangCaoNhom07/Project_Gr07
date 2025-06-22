<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Product extends Model
{
    //
    use HasFactory;
    protected $fillable = [
    'product_name',
    'selling_price',
    'actual_price',
    'average_rating',
    'rating_and_review',
    'ram',
    'ssd',
    'processor',
    'operating_system',
    'exchange_offer',
    'display_size',
];

}

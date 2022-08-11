<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $table = "purchases";

    protected $fillable = [
        'user_id',
        'product_id',
        'invoice_id',
        'price',
        'tax'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}

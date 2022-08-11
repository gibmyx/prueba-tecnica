<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = "invoices";

    protected $fillable = [
        'code',
        'user_id',
        'total_invoice',
        'total_tax',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function purchase()
    {
        return $this->hasMany(Purchase::class, 'invoice_id')
            ->with("product");
    }
}

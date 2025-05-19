<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'customer_id', 
        'product_id', 
        'transaction_date',
        'total_price'
    ];

    // Tambahkan ini untuk casting date
    protected $dates = ['transaction_date'];

    // Relasi ke customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Relasi ke product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Format tanggal
    public function getFormattedDateAttribute()
    {
        return $this->transaction_date->format('d/m/Y');
    }

    // Format harga
    public function getFormattedTotalAttribute()
    {
        return 'Rp' . number_format($this->total_price, 0, ',', '.');
    }
}
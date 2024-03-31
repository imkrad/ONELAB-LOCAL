<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TsrPayment extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $fillable = [
        'discount_id',
        'total',
        'discount',
        'or_number',
        'payment_id',
        'collection_id',
        'status_id',
        'paid_at'
    ];
}

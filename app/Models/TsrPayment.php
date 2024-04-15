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
        'paid_at',
        'is_paid'
    ];

    public function tsr()
    {
        return $this->belongsTo('App\Models\Tsr', 'tsr_id', 'id');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\ListDropdown', 'payment_id', 'id');
    }

    public function collection()
    {
        return $this->belongsTo('App\Models\ListDropdown', 'collection_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\ListStatus', 'status_id', 'id');
    }

    public function discounted()
    {
        return $this->belongsTo('App\Models\ListDiscount', 'discount_id', 'id');
    }

    public function setTotalAttribute($value)
    {
        $this->attributes['total'] = $this->attributes['total'] + trim(str_replace(',','',$value),'₱');
    }

    public function getTotalAttribute($value)
    {
        return '₱'.number_format($value,2,'.',',');
    }

    public function setDiscountAttribute($value)
    {
        $this->attributes['discount'] = trim(str_replace(',','',$value),'₱');
    }

    public function getDiscountAttribute($value)
    {
        return '₱'.$value;
    }
}

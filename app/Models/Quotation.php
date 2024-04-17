<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'terms',
        'mode',
        'total',
        'subtotal',
        'discount',
        'laboratory_id',
        'status_id',
        'customer_id',
        'purpose_id',
        'discount_id',
        'conforme_id',
        'created_by'
    ];

    public function samples()
    {
        return $this->hasMany('App\Models\QuotationSample', 'quotation_id');
    }

    public function laboratory()
    {
        return $this->belongsTo('App\Models\ListDropdown', 'laboratory_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\ListStatus', 'status_id', 'id');
    }

    public function discounted()
    {
        return $this->belongsTo('App\Models\ListDiscount', 'discount_id', 'id');
    }

    public function purpose()
    {
        return $this->belongsTo('App\Models\ListDropdown', 'purpose_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id', 'id');
    }

    public function conforme()
    {
        return $this->belongsTo('App\Models\CustomerConforme', 'conforme_id', 'id');
    }

    public function createdby()
    {
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }

    public function getUpdatedAtAttribute($value)
    {
        return date('M d, Y g:i a', strtotime($value));
    }

    public function getCreatedAtAttribute($value)
    {
        return date('M d, Y g:i a', strtotime($value));
    }

    public function getSubtotalAttribute($value)
    {
        return '₱'.number_format($value,2,'.',',');
    }

    public function getDiscountAttribute($value)
    {
        return '₱'.$value;
    }

    public function getTotalAttribute($value)
    {
        return '₱'.number_format($value,2,'.',',');
    }
}

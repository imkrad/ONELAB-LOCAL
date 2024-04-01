<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tsr extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'mode',
        'laboratory_id',
        'purpose_id',
        'status_id',
        'customer_id',
        'conforme_id',
        'received_by',
        'due_at'
    ];

    public function payment()
    {
        return $this->hasOne('App\Models\TsrPayment', 'tsr_id');
    }

    public function laboratory()
    {
        return $this->belongsTo('App\Models\ListDropdown', 'laboratory_id', 'id');
    }

    public function purpose()
    {
        return $this->belongsTo('App\Models\ListDropdown', 'purpose_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\ListStatus', 'status_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id', 'id');
    }

    public function conforme()
    {
        return $this->belongsTo('App\Models\CustomerConforme', 'conforme_id', 'id');
    }

    public function received()
    {
        return $this->belongsTo('App\Models\User', 'received_by', 'id');
    }

    public function getUpdatedAtAttribute($value)
    {
        return date('M d, Y g:i a', strtotime($value));
    }

    public function getCreatedAtAttribute($value)
    {
        return date('M d, Y g:i a', strtotime($value));
    }

    public function getDueAtAttribute($value)
    {
        return date('M d, Y', strtotime($value));
    }
}

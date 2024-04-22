<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TsrAnalysis extends Model
{
    use HasFactory;

    protected $fillable = [
        'status_id','analyst_id','sample_id','testservice_id','fee','start_at','end_at',
    ];

    public function status()
    {
        return $this->belongsTo('App\Models\ListStatus', 'status_id', 'id');
    }

    public function sample()
    {
        return $this->belongsTo('App\Models\TsrSample', 'sample_id', 'id');
    }

    public function testservice()
    {
        return $this->belongsTo('App\Models\ListTestservice', 'testservice_id', 'id');
    }

    public function analyst()
    {
        return $this->belongsTo('App\Models\User', 'analyst_id', 'id');
    }

    public function setFeeAttribute($value)
    {
        $this->attributes['fee'] = trim(str_replace(',','',$value),'₱');
    }

    public function getFeeAttribute($value)
    {
        return '₱'.number_format($value,2,'.',',');
    }

    public function getStartAtAttribute($value)
    {
        return date('M d, Y g:i a', strtotime($value));
    }

    public function getEndAtAttribute($value)
    {
        return date('M d, Y g:i a', strtotime($value));
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','fee','laboratory_type','sampletype_id','laboratory_id','is_active','is_synced'
    ];

    public function lists()
    {
        return $this->hasMany('App\Models\ListPackageList', 'package_id');
    }

    public function sampletype()
    {
        return $this->belongsTo('App\Models\ListName', 'sampletype_id', 'id');
    }

    public function laboratory()
    {
        return $this->belongsTo('App\Models\Laboratory', 'laboratory_id', 'id');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\ListDropdown', 'laboratory_type', 'id');
    }

    public function getUpdatedAtAttribute($value)
    {
        return date('M d, Y g:i a', strtotime($value));
    }

    public function getCreatedAtAttribute($value)
    {
        return date('M d, Y g:i a', strtotime($value));
    }

    public function setFeeAttribute($value)
    {
        $this->attributes['fee'] = trim(str_replace(',','',$value),'₱ ');
    }

    public function getFeeAttribute($value)
    {
        return '₱ '.$value;
    }
}

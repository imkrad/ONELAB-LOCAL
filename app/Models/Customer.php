<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'name_id',
        'email',
        'contact_no',
        'bussiness_id',
        'industry_id',
        'classification_id',
        'is_active',
        'is_main',
        'is_synced'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function customer_name()
    {
        return $this->belongsTo('App\Models\CustomerName', 'name_id', 'id');
    }

    public function tsrs()
    {
        return $this->hasMany('App\Models\Tsr', 'customer_id');
    }

    public function conformes()
    {
        return $this->hasMany('App\Models\CustomerConforme', 'customer_id');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\ListDropdown', 'type_id', 'id');
    }

    public function bussiness()
    {
        return $this->belongsTo('App\Models\ListDropdown', 'bussiness_id', 'id');
    }

    public function classification()
    {
        return $this->belongsTo('App\Models\ListDropdown', 'classification_id', 'id');
    }

    public function industry()
    {
        return $this->belongsTo('App\Models\ListDropdown', 'industry_id', 'id');
    }

    public function address()
    {
        return $this->morphOne('App\Models\Address', 'addressable');
    }
}

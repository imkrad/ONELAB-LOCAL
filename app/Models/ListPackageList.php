<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListPackageList extends Model
{
    use HasFactory;

    protected $fillable = [
        'testservice_id','is_synced'
    ];

    public function package()
    {
        return $this->belongsTo('App\Models\ListPackage', 'package_id', 'id');
    }

    public function testservice()
    {
        return $this->belongsTo('App\Models\ListTestservice', 'testservice_id', 'id');
    }

    public function getUpdatedAtAttribute($value)
    {
        return date('M d, Y g:i a', strtotime($value));
    }

    public function getCreatedAtAttribute($value)
    {
        return date('M d, Y g:i a', strtotime($value));
    }
}

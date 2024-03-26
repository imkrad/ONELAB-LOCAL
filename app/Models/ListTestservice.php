<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListTestservice extends Model
{
    use HasFactory;

    protected $fillable = [
        'code','laboratory_type','sampletype_id','testname_id','method_id','laboratory_id','is_active','is_synced'
    ];

    public function sampletype()
    {
        return $this->belongsTo('App\Models\ListName', 'sampletype_id', 'id');
    }

    public function testname()
    {
        return $this->belongsTo('App\Models\ListName', 'testname_id', 'id');
    }

    public function method()
    {
        return $this->belongsTo('App\Models\ListMethod', 'method_id', 'id');
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
}

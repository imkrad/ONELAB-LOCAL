<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListDiscount extends Model
{
    use HasFactory;

    protected $fillable = [
        'id','name','value','from','to','type_id','subtype_id','based_id','is_active'
    ];

    public function based()
    {
        return $this->belongsTo('App\Models\ListDropdown', 'based_id', 'id');
    } 

    public function type()
    {
        return $this->belongsTo('App\Models\ListDropdown', 'type_id', 'id');
    } 

    public function subtype()
    {
        return $this->belongsTo('App\Models\ListDropdown', 'subtype_id', 'id');
    } 

}

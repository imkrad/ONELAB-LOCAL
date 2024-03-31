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
}

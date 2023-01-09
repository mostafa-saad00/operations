<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kitchenreceiptitem extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function kitchenreceipt()
    {
        return $this->belongsTo(Kitchenreceipt::class);
    }
}

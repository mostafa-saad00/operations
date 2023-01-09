<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kitchenreceipt extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function kitchenreceiptitems()
    {
        return $this->hasMany(Kitchenreceiptitem::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kitchensupplier extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kitchenitems()
    {
        return $this->hasMany(Kitchenitem::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kitchendailydistributionitem extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kitchendailydistribution()
    {
        return $this->belongsTo(Kitchendailydistribution::class);
    }

    public function kitchenitem()
    {
        return $this->belongsTo(Kitchenitem::class);
    }
}

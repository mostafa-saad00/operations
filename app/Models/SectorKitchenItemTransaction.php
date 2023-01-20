<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectorKitchenItemTransaction extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function kitchenitem()
    {
        return $this->belongsTo(Kitchenitem::class);
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

}

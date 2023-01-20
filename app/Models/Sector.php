<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function sector_kitchen_item_transactions()
    {
        return $this->hasMany(SectorKitchenItemTransaction::class);
    }

}

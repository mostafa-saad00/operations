<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sectors()
    {
        return $this->hasMany(Sector::class);
    }

    public function sector_kitchen_item_transactions()
    {
        return $this->hasMany(SectorKitchenItemTransaction::class);
    }

}

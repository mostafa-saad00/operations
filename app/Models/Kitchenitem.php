<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kitchenitem extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kitchensupplier()
    {
        return $this->belongsTo(Kitchensupplier::class);
    }

    public function kitchendailydistributionitems()
    {
        return $this->hasMany(Kitchendailydistributionitem::class);
    }

    public function kitchenreceiptitems()
    {
        return $this->hasMany(Kitchenreceiptitem::class);
    }

    public function kitchenitemtransactions()
    {
        return $this->hasMany(Kitchenitemtransaction::class);
    }

    public function sector_kitchen_item_transactions()
    {
        return $this->hasMany(SectorKitchenItemTransaction::class);
    }

}

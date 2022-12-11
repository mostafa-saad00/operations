<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    use HasFactory;

    protected $table = "officers";

    protected $guarded = [];

    public function gehat()
    {
        return $this->belongsTo(Gehat::class);
    }

    public function pistol()
    {
        return $this->belongsTo(Pistol::class);
    }

    public function trainings()
    {
        return $this->belongsToMany(Training::class);
    }

    public function weeklyofficeroperations()
    {
        return $this->hasMany(Weeklyofficeroperation::class);
    }

    public function photo()
    {
        return $this->hasOne(Photo::class);
    }

    
}

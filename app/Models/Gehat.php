<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gehat extends Model
{
    use HasFactory;

    protected $table = "gehats";

    protected $guarded = [];

    public function officers()
    {
        return $this->hasMany(Officer::class);
    }
}

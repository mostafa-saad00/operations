<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pistol extends Model
{
    use HasFactory;

    protected $table = "pistols";

    protected $guarded = [];

    public function officer()
    {
        return $this->hasOne(Officer::class);
    }
}

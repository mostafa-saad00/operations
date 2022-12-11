<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $table = "photos";

    protected $guarded = [];

    public function officer()
    {
        return $this->belongsTo(Officer::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ma2moryat extends Model
{
    use HasFactory;

    protected $table = "ma2moryats";

    protected $guarded = [];

    public function officer($id)
    {
        return Officer::where('id', $id)->first()->name;
    }

    public function dailyoperation($id)
    {
        return Dailyoperation::where('id', $id)->first()->name;
    }
}

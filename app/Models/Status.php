<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static completed()
 */
class Status extends Model
{
    use HasFactory;

    function scopeCompleted($query){
        return $query->where("id","=",3)->first();
    }
}

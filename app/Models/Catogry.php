<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catogry extends Model
{
    protected $fillable = [
        'name' , 'parent'
    ];
}

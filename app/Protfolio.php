<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Protfolio extends Model
{
    protected $fillable=[
        'title', 'sub_image', 'small_image','description','clint','category'
    ];
}

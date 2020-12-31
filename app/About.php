<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable=[
        'title', 'sub_title','description','image'
    ];
}

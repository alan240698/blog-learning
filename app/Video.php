<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //bỏ created_at và update_at
    public $timestamps = false;
     protected $table = "video";
}



<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sessions extends Model
{

    public $timestamps = false;
    protected $dates = ['created_at'];
}

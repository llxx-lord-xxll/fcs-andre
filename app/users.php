<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Kodeine\Metable\Metable;
class users extends Model
{
    use Metable;
    protected $metaTable = 'users_meta';


}

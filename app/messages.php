<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kodeine\Metable\Metable;

class messages extends Model
{
    use Metable;
    use meta_ext;
    protected $metaTable = 'message_metas';
    protected $dates = ['created_at'];
}

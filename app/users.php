<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Kodeine\Metable\Metable;

trait meta_ext
{
    public function insertMeta($key,$content)
    {

        $tbl = DB::table($this->getMetaTable());
        $tbl->insert(
            ['id'=>null,$this->getMetaKeyName() => $this->id, 'type'=>'string', 'key'=>$key,'value'=>$content,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]
        );
        $this->updated_at = Carbon::now();
        $this->save();
        return true;
    }

    public function getByMeta($key=null,$content = null)
    {
        $tbl = DB::table($this->getMetaTable());
        if ($key==null && $content==null){return false;}

        if ($this->id)
        {
            $tbl->where($this->getMetaKeyName(),'=',$this->id);
        }

        if ($key)
        {
            $tbl = $tbl->where('key','=',$key);
        }

        if ($content)
        {
            $tbl = $tbl->where('value','=',$content);
        }


        return $tbl;
    }
}


class users extends Model
{
    use Metable;
    use meta_ext;
    protected $metaTable = 'users_meta';
    protected $dates = ['created_at'];

    public function isOnline()
    {
        return Cache::has('user-online-'.$this->id);
    }
}

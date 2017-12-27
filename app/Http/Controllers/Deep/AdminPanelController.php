<?php

namespace App\Http\Controllers;

use App\sessions;
use App\User;
use App\users;
use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
    public function generate_view(Request $request,$view)
    {
        $v = view('user.'.$view);
        switch ($view)
        {
            case 'dashboard':

                break;
            case 'posts':

                break;
            case 'userman':
                $v = $v->with('users',$this->get_users());
                break;
            case 'chapters':

                break;
            default:

                break;
        }
        return $v;
    }

    public static function get_users()
    {
        $filter = null;
        $tmpRet = array();
        if($filter===null)
        {
            foreach (users::get() as $user)
            {
                if($user->status ==1)
                {
                    $ses = sessions::where('user_id','=',$user->id)->orderBy('id','desc');
                    if ($ses->first())
                    {
                        $ses = $ses->first()->created_at->format('d-M-Y h:i:s');

                    }
                    else
                    {
                        $ses=null;
                    }
                    $u = User::find($user->id);
                    $tmpRoles = "";
                    foreach ($u->roles()->get() as $role)
                    {
                        $tmpRoles .= $role->name . ", ";
                    }
                    $tmpRoles = rtrim($tmpRoles,", ");
                   // die("");

                    array_push($tmpRet,array($user->user_id,$user->name,$user->email,$tmpRoles,$user->created_at->format('d-M-Y'),$ses));
                }
            }
        }
        return $tmpRet;

    }
}

<?php

namespace App\Http\Controllers\Deep;

use App\Http\Controllers\Controller;
use App\sessions;
use App\User;
use App\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class AdminPanelController extends Controller
{
    public function generate_view(Request $request,$page,$function)
    {
        switch ($page)
        {
            case 'dashboard':

                return $this->process_view_dashboard($request,$function);
                break;
            case 'users':
                return $this->process_view_user($request,$function);

                break;
            case 'chapters':

                break;
            default:

                break;
        }
    }


    function process_view_dashboard(Request $request,$function)
    {
        $v = view('user.dashboard');
        return $v;
    }
    function process_view_user(Request $request,$function)
    {
        $v = view('user.userman');
        $arrUsers = array();

        if(Auth::user()->hasAnyPermission(['manage superadmins', 'manage admins', 'manage chapterleaders']))
        {

            if (Auth::user()->can('manage superadmins'))
            {
                $arrUsers = array_merge($arrUsers,$this->get_users('sa'));
            }

            if (Auth::user()->can('manage admins'))
            {
                $arrUsers = array_merge($arrUsers,$this->get_users('a'));
            }
            if (Auth::user()->can('manage chapterleaders'))
            {
                $arrUsers = array_merge($arrUsers,$this->get_users('cl'));
            }

        }
        else
        {
            return redirect('/'.env('ADMIN_PATH'));
        }

        $v->with('users',$arrUsers);

        return $v;
    }

    function get_users($filter = null)
    {
        $tmpRet = array();
        $users_mod = User::all();
        if($filter=='sa')
        {
            $users_mod = User::role('Super Admin')->get();

        }
        if($filter=='a')
        {
            $users_mod = User::role('Admin')->get();
        }
        if($filter=='cl')
        {
            $users_mod = User::role('Chapter Leader')->get();
        }
            foreach ($users_mod as $user)
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

                    array_push($tmpRet,array($user->user_id,$user->name,$user->email,$tmpRoles,$user->created_at->format('d-M-Y'),$ses));
                }
            }

        return $tmpRet;

    }
}

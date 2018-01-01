<?php

namespace App\Http\Controllers\Deep;

use App\Http\Controllers\Controller;
use App\sessions;
use App\User;
use App\users;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;

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
            case 'myprofile':
                return $this->process_view_myprofile($request,$function);
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
    function process_view_myprofile(Request $request,$function)
    {

        switch ($function)
        {
            case 'general':
                $v = view('user.myprofile-general');
                break;
            case 'contact':
                $v = view('user.myprofile-contact');
                break;
            case 'experience':
                $v = view('user.myprofile-experience');
                break;
            case 'education':
                $v = view('user.myprofile-education');
                break;
            default:
                return redirect('/'.env('ADMIN_PATH').'/myprofile/general');
                break;
        }

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
    public function get_avatar($u = null)
    {

        $default_av = "user/assets/img/avatars/placeholders/ava-256.png";
        $avatar= "";
        if ($u ==null) {
            $u = Auth::user()->getAuthIdentifier();
        }
        if (users::find($u))
        {
            $avatar = users::find($u)->getMeta('avatar');
            if ($avatar)
            {
                $avatar = "user/uploads/avatar/$avatar";
            }
            else
            {
                $avatar=$default_av;
            }
        }


        return $avatar;
    }

    public function handle_posts(Request $request,$page,$function)
    {
        $resp = array();
        switch ($page)
        {
            case 'myprofile':
                switch ($function)
                {
                    case 'general':
                        $validator = Validator::make($request->all(),[
                            'dp.*' => 'required|mimes:jpeg,bmp,png'
                        ]);

                        if ($validator->fails()) {
                            array_push($resp,array('error','Image could not be uploaded'));
                        }
                        else
                        {
                            $avatar = Auth::user()->getAuthIdentifier() . '_' . md5(uniqid()) . '.' . $request->file('dp.0')->getClientOriginalExtension();
                            $f = $request->file('dp.0');
                            $f->move(base_path('public\user\uploads\avatar'),$avatar);
                            $avsave = users::find( Auth::user()->getAuthIdentifier());
                            $avsave->setMeta('avatar',$avatar);
                            $avsave->save();

                            array_push($resp,array('success','Image uploaded successfully'));
                        }


                        break;

                    case 'contact':
                        $validator = Validator::make($request->all(),[
                            'name' => 'required',
                            'mob' => 'required',
                            'country' => 'required',
                            'city' => 'required'
                        ]);

                        if ($validator->fails()) {
                            array_push($resp,array('error','Image could not be uploaded'));
                        }
                        else
                        {
                            $u = users::find(Auth::user()->getAuthIdentifier());

                            $u->name = $request->input('name');
                            $u->setMeta('mob',$request->input('mob'));
                            $u->setMeta('country',$request->input('country'));
                            $u->setMeta('city',$request->input('city'));
                            $u->setMeta('state',$request->input('state'));
                            $u->setMeta('po',$request->input('po'));
                            $u->setMeta('headline',$request->input('headline'));
                            $u->save();
                            array_push($resp,array('success','Contact info updated successfully'));
                        }



                        break;
                    default:
                        array_push($resp,array('error','Method not allowed'));
                        break;
                }
                break;
            default:
                array_push($resp,array('error','Method not allowed'));
                break;
        }
        return json_encode($resp);
    }


}


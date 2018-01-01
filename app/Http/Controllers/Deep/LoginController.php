<?php

namespace App\Http\Controllers\Deep;

use App\Http\Controllers\Controller;
use App\sessions;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function isAuth(Request $request)
    {
        if($request->cookies->has('phpsesid'))
        {
            $sesid = decrypt($request->cookie('phpsesid'));
            $checker = sessions::where('sescode','=',$sesid)->where('user_agent','=',$request->userAgent())->first();
            if($checker)
            {
                $user = User::find($checker->user_id);
                if($user)
                {
                    Auth::login($user,true);
                    return true;
                }
            }
        }
        $this->logout($request);
        return false;
    }
    public function login(Request $request)
    {
        if($request->has('email') && $request->has('pw')) {
            if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('pw'), 'status' => 1])) {
                $struid = md5(uniqid());
                $ses = new sessions;
                $ses->user_id = Auth::user()->id;
                $ses->sescode = $struid;
                $ses->ip_address = $request->ip();
                $ses->user_agent = $request->userAgent();
                if($ses->save())
                {
                    $user = User::find(Auth::user()->getAuthIdentifier());
                    Auth::login($user,true);
                    return redirect(env('ADMIN_PATH','cp'))->withCookie(cookie()->forever('phpsesid', $struid));
                }
                else
                {
                    $arrError = array('response_type'=>'error','response_body'=>'Session could not be established');
                    return json_encode($arrError);
                }
            }
            else
            {
                $arrError = array('response_type'=>'error','response_body'=>'Invalid credentials');
                return json_encode($arrError);
            }
        }
        else
        {
            $arrError = array('response_type'=>'error','response_body'=>'Check your missing inputs');
            return json_encode($arrError);

        }

    }
    public function logout(Request $request)
    {

        if($request->cookies->has('phpsesid'))
        {
            $sesid = $request->cookie('phpsesid');

            $checker = sessions::where('sescode','=',$sesid)->where('user_agent','=',$request->userAgent());
            $checker->delete();

        }
        Auth::logout();
        //Session::flush();
        return redirect('/')->withCookie(\cookie()->forget('phpsesid'));
    }


    public function index(Request $request)
    {
        if (Auth::check())
        {
           return redirect('/cp');
        }
        else
        {
            return view('user.login');
        }
    }
}

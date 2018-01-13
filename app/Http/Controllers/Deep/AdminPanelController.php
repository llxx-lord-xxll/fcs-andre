<?php

namespace App\Http\Controllers\Deep;

use App\Http\Controllers\Controller;
use App\messages;
use App\sessions;
use App\User;
use App\users;
use Carbon\Carbon;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
            case 'messages':
                return $this->process_view_message($request,$function);

                break;
            case 'search':
                return $this->process_view_search($request,$function);
                break;
            case '+':
                return $this->process_view_profile($request,$function);
                break;
            case 'myprofile':
                return $this->process_view_myprofile($request,$function);
                break;
            default:
                return view('user.404');
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
    function process_view_search(Request $request,$function)
    {
        $v = view('user.search');
        if ($request->has('where'))
        {
            $arrProf = array();

            foreach (User::where('name','like','%'.$request->input('where').'%')->get() as $u)
            {
                $avatar = $this->get_avatar($u->id);
                $gender = users::find($u->id)->getMeta('gender');
                $headline = users::find($u->id)->getMeta('headline');
                $uname = users::find($u->id)->getMeta('username');
                if ($uname==null)
                {
                    $um = users::find($u->id);
                    $um->setMeta('username',uniqid('usr-'));
                    $um->save();
                    $uname = users::find($u->id)->getMeta('username');
                }


                array_push($arrProf,array('id'=>$uname,'avatar'=>$avatar,'name'=>$u->name,'gender'=>$gender,'role'=>$u->roles()->first()->name,'headline'=>$headline));
            }

            return $v->with('arrProf',$arrProf);

        }
    }
    function process_view_profile(Request $request,$function)
    {
        $v = view('user.profile');
        $u = (new users())->getByMeta('username',$function)->first();
        if ($u)
        {
            $u = User::find($u->users_id);
            $v = $v->with('u',$u);

        }
        else{
            $v = view('user.404');
        }


       return $v;
    }
    function process_view_message(Request $request,$function)
    {
        $v = view('user.messages');
        switch ($function)
        {
            case 'create':

                if ($request->has('user'))
                {
                    $usr = (new users())->getByMeta('username',$request->input('user'))->first();
                    $msg = false;
                    if($usr)
                    {
                        $myconvs = (new messages())->getByMeta('participant', Auth::user()->getAuthIdentifier());

                        foreach ($myconvs->get() as $myconv)
                        {

                            $mysingconv = messages::find($myconv->messages_id);
                            if($mysingconv->getByMeta('participant')->count() == 2)
                            {
                                if($mysingconv->getByMeta('participant',$usr->users_id)->first())
                                {
                                    $msg = $mysingconv;
                                    break;
                                }
                            }
                        }

                        if($msg)
                        {
                            return redirect('/'.env('ADMIN_PATH').'/messages/#'. $msg->id);
                        }
                        else
                        {
                            $msg = new  messages() ;
                            $msg->created_by = Auth::user()->getAuthIdentifier();
                            $msg->created_at = Carbon::now();
                            $msg->save();
                            $msg->insertMeta('participant',Auth::user()->getAuthIdentifier());
                            $msg->insertMeta('participant',$usr->users_id);
                            return redirect('/'.env('ADMIN_PATH').'/messages/'. $msg->id);
                        }
                    }
                }

                break;
            default:

                break;
        }

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
    function array_sort_by_column(&$array, $column, $direction = SORT_DESC) {
        $reference_array = array();

        foreach($array as $key => $row) {
            $reference_array[$key] = $row[$column];
        }

        array_multisort($reference_array, $direction, $array);
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
                            array_push($resp,array('status'=>'error','msg'=>'Image could not be uploaded'));
                        }
                        else
                        {
                            $avatar = Auth::user()->getAuthIdentifier() . '_' . md5(uniqid()) . '.' . $request->file('dp.0')->getClientOriginalExtension();
                            $f = $request->file('dp.0');
                            $f->move(base_path('public\user\uploads\avatar'),$avatar);
                            $avsave = users::find( Auth::user()->getAuthIdentifier());
                            $avsave->setMeta('avatar',$avatar);
                            $avsave->save();

                            array_push($resp,array('status'=>'success','msg'=>'Image uploaded successfully'));
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
                            array_push($resp,array('status'=>'error','msg'=>'Image could not be uploaded'));
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
                            array_push($resp,array('status'=>'success','msg'=>'Contact info updated successfully'));
                        }



                        break;

                    case 'experience':
                        $validator = Validator::make($request->all(),[
                            'xpsubmit' => 'required'
                        ]);


                        if ($validator->fails()) {
                            array_push($resp,array('status'=>'error','msg'=>'Work could not be added'));
                        }
                        else
                        {
                            if ($request->input('xpsubmit') == "add")
                            {
                                $validator = Validator::make($request->all(),[
                                    'xpsubmit' => 'required',
                                    'company' => 'required',
                                    'title' => 'required',
                                    'from' => 'required'
                                ]);
                                if ($validator->fails()) {
                                    array_push($resp,array('status'=>'error','msg'=>'Work could not be added'));
                                }
                                else{
                                    $ts = $request->all();
                                    unset($ts['_token']);
                                    $ts = json_encode($ts);
                                    users::find(Auth::user()->getAuthIdentifier())->insertMeta('work',$ts);
                                    array_push($resp,array('status'=>'success','msg'=>'Work added successfully'));
                                }
                            }
                            elseif ($request->input('xpsubmit') == "del")
                            {
                                $validator = Validator::make($request->all(),[
                                    'xpsubmit' => 'required',
                                    'content' => 'required',
                                ]);
                                if ($validator->fails()) {
                                    array_push($resp,array('status'=>'error','msg'=>'Work could not be deleted'));
                                }
                                else{
                                    $um = DB::table('users_meta')->where('id','=',$request->input('content'));
                                    if ($um->first())
                                    {
                                        if ($um->first()->users_id == Auth::user()->getAuthIdentifier())
                                        {
                                            $um->delete();
                                            array_push($resp,array('status'=>'success','msg'=>'Work deleted successfully'));
                                        }
                                        else{
                                            array_push($resp,array('status'=>'error','msg'=>'Work could not be deleted'));
                                        }
                                    }
                                    else{
                                        array_push($resp,array('status'=>'error','msg'=>'Work could not be deleted'));
                                    }
                                }

                            }


                        }


                        break;

                    case 'education':
                        $validator = Validator::make($request->all(),[
                            'edusubmit' => 'required'
                        ]);


                        if ($validator->fails()) {
                            array_push($resp,array('status'=>'error','msg'=>'Work could not be added'));
                        }
                        else
                        {
                            if ($request->input('edusubmit') == "add")
                            {
                                $validator = Validator::make($request->all(),[
                                    'edusubmit' => 'required',
                                    'institue' => 'required',
                                    'degree' => 'required',
                                    'group' => 'required',
                                    'from' => 'required'
                                ]);
                                if ($validator->fails()) {
                                    array_push($resp,array('status'=>'error','msg'=>'Work could not be added'));
                                }
                                else{
                                    $ts = $request->all();
                                    unset($ts['_token']);
                                    $ts = json_encode($ts);
                                    users::find(Auth::user()->getAuthIdentifier())->insertMeta('education',$ts);
                                    array_push($resp,array('status'=>'success','msg'=>'Education added successfully'));
                                }
                            }
                            elseif ($request->input('edusubmit') == "del")
                            {
                                $validator = Validator::make($request->all(),[
                                    'edusubmit' => 'required',
                                    'content' => 'required',
                                ]);
                                if ($validator->fails()) {
                                    array_push($resp,array('status'=>'error','msg'=>'Education could not be deleted'));
                                }
                                else{
                                    $um = DB::table('users_meta')->where('id','=',$request->input('content'));
                                    if ($um->first())
                                    {
                                        if ($um->first()->users_id == Auth::user()->getAuthIdentifier())
                                        {
                                            $um->delete();
                                            array_push($resp,array('status'=>'success','msg'=>'Education deleted successfully'));
                                        }
                                        else{
                                            array_push($resp,array('status'=>'error','msg'=>'Education could not be deleted'));
                                        }
                                    }
                                    else{
                                        array_push($resp,array('status'=>'error','msg'=>'Education could not be deleted'));
                                    }

                                }

                            }


                        }


                        break;
                    default:
                        array_push($resp,array('status'=>'error','msg'=>'Method not allowed'));
                        break;
                }
                break;
            case 'messages':
                switch ($function)
                {
                    case 'get_conversations':

                        $myconvs = (new messages())->getByMeta('participant', Auth::user()->getAuthIdentifier());
                        $myconvarray = array();

                        foreach ($myconvs->get() as $myconv)
                        {
                            $msg_title = "";
                            $msg_type = "";
                            $msg_short = "";
                            $mysingconv = messages::find($myconv->messages_id);

                            if($mysingconv->getByMeta('participant')->count() == 2)
                            {
                                $msg_type = "private";
                                foreach ($mysingconv->getByMeta('participant')->get() as $otherpart)
                                {
                                    if ($otherpart->value != Auth::user()->getAuthIdentifier())
                                    {
                                        $msg_title = users::find($otherpart->value)->name;
                                    }
                                }
                                if ($msg_title=="")
                                {
                                    $msg_title = "You";
                                }
                            }
                            else
                            {
                                $msg_type = "group";
                                $gt = $mysingconv->getMeta('title')->first();
                                $msg_title  = $gt?$gt->value:"Group Chat";
                            }

                            if($mysingconv->getByMeta('message')->count() >0)
                            {
                                $msg_short = json_decode($mysingconv->getByMeta('message')->orderBy('id','DESC')->first()->value,true);
                                if($msg_short)
                                {
                                    $msg_short = '<span style="font-weight: bold;">'.User::find($msg_short['sender'])->name.'</span>' . ": " . substr($msg_short['msg'],0,15) . "...";
                                }
                            }

                            $tmpArray = array($mysingconv->id,$msg_title,$msg_type,$msg_short,Carbon::parse($mysingconv->updated_at)->toDateTimeString());
                            if(!in_array($tmpArray,$myconvarray))
                            {
                                array_push($myconvarray,$tmpArray);
                            }
                        }
                        $this->array_sort_by_column($myconvarray, '4');


                        array_push($resp,array('status'=>'success','msg'=>'Conversations listed','content'=>$myconvarray));
                        break;
                    case 'get_dis_info':
                        $arrDisInfo = array();
                            if($request->has('convid'))
                            {
                                $conv = messages::find($request->input('convid'));
                                $msgs = array();
                                $participants = array();
                                $msgsModel = $conv->getByMeta('message')->orderBy('id','DESC')->take(30);
                                $participantsModel = $conv->getByMeta('participant');

                                foreach ($msgsModel->get()->reverse() as $msg)
                                {
                                    $msgval = json_decode($msg->value,true);
                                    $msgsender = users::find($msgval['sender']);
                                    if($msgsender)
                                    {
                                        $msgsender = array('name' => $msgsender->name,'username'=>$msgsender->getMeta('username'),'avatar'=>asset( (new \App\Http\Controllers\Deep\AdminPanelController())->get_avatar($msgval['sender'])),'self' => Auth::user()->getAuthIdentifier()== $msgsender->id);
                                    }
                                    else
                                    {
                                        $msgsender = array('name' => 'Unknown','username'=>'','avatar'=>'','self'=>'');
                                    }


                                    array_push($msgs,array('sender'=>$msgsender,'msg'=>$msgval['msg'],'time'=>Carbon::parse($msg->created_at)->format('d-M-Y g:i:s A')));
                                }


                                foreach ($participantsModel->get() as $participant)
                                {
                                    $user = users::find($participant->value);
                                    if($user)
                                    {
                                        $the_part = array('name' => $user->name,'username'=>$user->getMeta('username'),'avatar'=>asset( (new \App\Http\Controllers\Deep\AdminPanelController())->get_avatar($user->id)),'admin'=>($conv->created_by==$user->id));
                                    }
                                    else
                                    {
                                        $the_part = array('name' => 'Unknown','username'=>'','avatar'=>'');
                                    }

                                    array_push($participants,$the_part);
                                }



                                $msg_title = "";

                                if($conv->getByMeta('participant')->count()>2) {
                                    $gt = $conv->getMeta('title')->first();
                                    $msg_title = $gt ? $gt->value : "Group Chat";
                                }else{

                                    foreach ($conv->getByMeta('participant')->get() as $otherpart)
                                    {
                                        if ($otherpart->value != Auth::user()->getAuthIdentifier())
                                        {
                                            $msg_title = users::find($otherpart->value)->name;
                                        }
                                    }
                                    if ($msg_title=="")
                                    {
                                        $msg_title = "You";
                                    }
                                }


                                if ($conv)
                                {
                                    array_push($arrDisInfo,array($conv->id,$msg_title,$conv->created_by,Carbon::parse($conv->created_at)->format('d-M-Y g:i:s A'),$conv->getByMeta('participant')->count(),$msgs,$participants,Carbon::parse($conv->updated_at)->format('d-M-Y g:i:s A')));
                                }
                                else
                                {
                                    array_push($resp,array('status'=>'error','msg'=>'Invalid conversation ID passed'));
                                }
                            }
                            else
                            {
                                array_push($resp,array('status'=>'error','msg'=>'Method not allowed'));
                            }
                        array_push($resp,array('status'=>'success','msg'=>'Conversation show successful','content'=>$arrDisInfo));
                        break;

                    case 'send_message':
                        $validator = Validator::make($request->all(),[
                            'convid' => 'required|integer',
                            'message' => 'required|string'
                        ]);

                        if ($validator->fails()) {
                            array_push($resp,array('status'=>'error','msg'=>'Message could not be sent'));
                        }
                        else
                        {

                            $conv = messages::find($request->input('convid'));
                            if($conv->getByMeta('participant',Auth::user()->getAuthIdentifier())->first())
                            {
                                $arrMsgPack = array('sender'=>Auth::user()->getAuthIdentifier(),'msg'=>$request->input('message'));
                                $conv->insertMeta('message',json_encode($arrMsgPack));
                                array_push($resp,array('status'=>'success','msg'=>'Message sent!'));
                            }
                            else
                            {
                                array_push($resp,array('status'=>'error','msg'=>'Method not allowed'));
                            }

                        }
                        break;
                    default:

                        break;

                }
                break;
            default:
                array_push($resp,array('status'=>'error','msg'=>'Method not allowed'));
                break;
        }
        return json_encode($resp);
    }


}


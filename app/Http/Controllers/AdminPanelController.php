<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
    //
    public function index(Request $request)
    {
        $u = new \App\roles();
        $u->title = "Super Admins";
        $u->addMeta('permission',1);
        $u->save();


    }
}

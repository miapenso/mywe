<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function __construct(){}
    public function index($login_type = 'system')
    {
        $data = array();
        $data['login_type'] = $login_type;
        return view('web.login',$data);
    }
    public function doLogin(){
       var_dump($_POST);
    }
}
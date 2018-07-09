<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\User;

class LoginController extends Controller
{
    public function __construct(){}
    public function index($login_type = 'system')
    {
        $data = array();
        $data['login_type'] = $login_type;
        return view('web.login',$data);
    }
    public function dologin(Request $request){
        $login = $request->input('login');
        $user = new User();
        $checkLogin = $user->checkLogin($login);
        $status = false;
        if( $checkLogin == USER_LOGIN_SUCCESS)  $status = true;
        return json_encode(array('status'=>$status,'message'=>config('code.'.$checkLogin)));
    }
}

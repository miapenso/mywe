<?php
namespace App\Modules;

use App\Modules\Oauth\Oauth2;


class User
{
    /**
     * 用户模块
     */
    public function __construct() {}

    /**
     * 检查登录
     * @param array $post
     * @return string
     */
    public function checkLogin($post = array()){

        $loginTypeArray = array('system', 'mobile');
        $selectLoginType = isset($post['login_type'])?$post['login_type'] : '';
        if( !in_array($selectLoginType,$loginTypeArray) ){
            $post['login_type'] = 'system';
        }
        $client = new Oauth2($post);
        $doLogin = $client->doLogin();
        return $doLogin;
    }


}
<?php
namespace App\Modules\Oauth;

use App\Modules\Oauth\System;
use App\Modules\Oauth\Mobile;
use App\Modules\Oauth\QQ;
use App\Modules\Oauth\Wechat;

class Oauth2ClientFactory
{
    public function createClient($post){

        switch ($post['login_type']){
            case 'system': $client =  new System($post);break;
            case 'mobile': $client = new Mobile($post);break;
            case 'qq': $client = new QQ();break;
            case 'wechat': $client = new Wechat();break;
            default:$client =  new System($post);break;
        }
        return $client;
    }
}


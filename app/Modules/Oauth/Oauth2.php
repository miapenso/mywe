<?php
namespace App\Modules\Oauth;

use App\Modules\Oauth\Oauth2ClientFactory;

class Oauth2
{
    /**
     * 登录模块
     */
    private $client;
    public function __construct($post) {
        $Oauth2ClientFactory = new Oauth2ClientFactory();
        $this->client = $Oauth2ClientFactory->createClient($post);
    }
    public function doLogin(){
        return $this->client->doLogin();
    }
}

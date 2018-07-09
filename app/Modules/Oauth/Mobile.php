<?php
namespace App\Modules\Oauth;

use App\Modules\Oauth\Oauth2Client;


class Mobile extends Oauth2Client
{
    private $mobile;
    public function __construct($post)
    {
        parent::__construct();
        $this->mobile = isset($post['username']) ? $post['username'] : '';
        $this->password = isset($post['password']) ? $post['password'] : '';
        $this->verify = isset($post['verify']) ? $post['verify'] : '';
    }
    public function doLogin(){

        if( empty($this->mobile) || empty($this->password))
        {
            return USER_MOBILE_NO_EXIST;
        }
        if (!preg_match(REGULAR_MOBILE, $this->mobile))
        {
            return USER_MOBILE_INVALID;
        }

        $userRepository = $this->userRepository;
        $user = $userRepository->mobile($this->mobile);
        if( empty($user) )
        {
            return USER_MOBILE_NO_EXIST;
        }
        $checkUserLoginLimit = $this->checkUserLoginLimit($user);
        return $checkUserLoginLimit;
    }
}

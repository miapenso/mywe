<?php
namespace App\Modules\Oauth;

use App\Modules\Oauth\Oauth2Client;

class System extends Oauth2Client
{
    private $username;
    public function __construct($post)
    {
        parent::__construct();
        $this->username = isset($post['username']) ? $post['username'] : '';
        $this->password = isset($post['password']) ? $post['password'] : '';
        $this->verify = isset($post['verify']) ? $post['verify'] : '';
    }
    public function doLogin(){

        if( empty($this->username) || empty($this->password))
        {
            return USER_USERNAME_NO_EXIST;
        }
        $userRepository = $this->userRepository;
        $user = $userRepository->username($this->username);
        if( empty($user) )
        {
            return USER_USERNAME_NO_EXIST;
        }
        $checkUserLoginLimit = $this->checkUserLoginLimit($user);
        return $checkUserLoginLimit;
    }
}

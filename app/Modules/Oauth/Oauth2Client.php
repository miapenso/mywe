<?php
namespace App\Modules\Oauth;

use App\Repository\UserRepository;
use App\Libs\CommonUtils;

class Oauth2Client
{
    protected $commonUtils;
    protected $userRepository;
    protected $verify;
    protected $password;
    public function __construct()
    {
        $this->commonUtils = new CommonUtils();
        $this->userRepository = new UserRepository();
    }

    public function doLogin(){}
    /**
     * 登录成功
     * @param int $uid
     */
    public function loginSuccess($uid=0)
    {
        $this->userRepository->loginSuccess($uid);
        //记录登录信息 未实现
        session('uuid', $uid);

    }
    public function checkUserLoginLimit($user)
    {
        $isVerify = $this->commonUtils->loginIsVerifyCode();

        if( $isVerify )
        {
            if(empty($this->verify) || !captcha_check($this->verify))
            {
                return USER_LOGIN_VERIFY_ERROR;
            }
        }
        $loginFailuresNumber = $this->userRepository->loginFailuresNumber($user->username);
        if( $loginFailuresNumber >= 5 )
        {
            return USER_PASSWORD_ERROR_FIVE_TIMES;
        }
        $pwd = generatePassword($this->password,$user->salt,MYWE_AUTHKEY);
        if( $pwd != $user->password )
        {
            $this->userRepository->loginFailures($user->username);
            return USER_PASSWORD_ERROR;
        }
        if( $user->status ==  USER_STATUS_CHECK )
        {
            return USER_IS_CHECK;
        }
        if( $user->status ==  USER_STATUS_BAN )
        {
            return USER_IS_BAN;
        }
        $isFounder = $this->userRepository->userIsFounder($user->uid);
        if( $isFounder && (!empty($user->endtime) && $user->endtime < time()) )
        {
            return USER_IS_OVERTIME;
        }
        $this->loginSuccess($user->uid);
        return USER_LOGIN_SUCCESS;
    }
}

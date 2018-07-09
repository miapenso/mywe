<?php

namespace App\Repository;
use Illuminate\Support\Facades\DB;

class UserRepository
{
    protected $dbHandle;
    protected $field = [
        'uid','owner_uid','groupid','founder_groupid','username','password','salt','type','status','joindate','joinip','lastvisit','lastip','remark','starttime','endtime','register_type','openid'
    ];
    public function __construct()
    {
        $this->dbHandle = DB::table('users');
    }

    /**
     * 通过用户名查找账号
     * @param string $username
     * @return object
     */
    public function username($username=''){
        $result = $this->dbHandle->select("*")->where(array('username' => $username))->first();
        return $result;
    }
    /**
     * 通过手机查找账号
     * @param string $mobile
     * @return object
     */
    public function mobile($mobile=''){
        return array();
    }

    /**
     * 返回5分钟内容用户登录失败次数
     * @param string $username
     * @return int
     */
    public function loginFailuresNumber($username=''){
        return 4;
    }
    /**
     * 登录成功
     * @param int $uid
     */
    public function loginSuccess($uid=0)
    {
        $ip = Request()->ip();
        $update = array('lastvisit' => time(),'lastip'=>$ip);
        $this->dbHandle->where(array('uid'=>$uid))->update($update);

        //记录登录信息 未实现

    }
    /**
     * 登录失败
     * @param string $username
     * @return string
     */
    public function loginFailures($username=''){
        return $username;
    }
    public function userIsFounder($uid=0)
    {
        $founders = explode(',', USER_FOUNDER);
        if (in_array($uid, $founders)) {
            return true;
        } else {
            $user =  $this->dbHandle->select("founder_groupid")->where(array('uid' => $uid))->first();
            if ($user->founder_groupid == ACCOUNT_MANAGE_GROUP_VICE_FOUNDER) {
                return true;
            }
        }
        return false;
    }



}
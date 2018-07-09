<?php
namespace App\Libs;

use Illuminate\Support\Facades\DB;

class CommonUtils {

    /**
     * 构造函数
     */
    public function __construct()
    {

    }
    /**
     * 获取后台菜单数据
     */
    public function getMenus()
    {
        return array();
    }
    /**
     * 获取后台菜单数据
     */
    public function getCoreSetting()
    {
        $coreSetting = DB::table('core_settings')->select('key','value')->get();
        $settings = array();
        if(!empty($coreSetting)){
            foreach ($coreSetting as $k => &$v) {
                $result = iunserializer($v->value);
                $settings[$v->key] = $result;
            }
        }
        return $settings;
    }

    /**
     * 后台登录是否开启验证码
     * @return bool
     */
    public function loginIsVerifyCode()
    {
        $coreSetting = $this->getCoreSetting();
        if( isset($coreSetting['copyright']['verifycode']) && !empty($coreSetting['copyright']['verifycode']) )return true;
        return false;
    }

}
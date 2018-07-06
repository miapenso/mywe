<?php
namespace App\Libs;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommonUtils {

    public $menus;
    public $coreSetting;
    /**
     * 构造函数
     */
    public function __construct(Request $request) {
        $this->init($request);
    }

    /**
     * 初始化函数
     */
    private function init(Request $request) {
        $this->getMenus($request);
        $this->getCoreSetting($request);

    }
    /**
     * 获取后台菜单数据
     */
    private function getMenus(Request $request) {
        $this->menus = array();
    }
    /**
     * 获取后台菜单数据
     */
    private function getCoreSetting(Request $request) {
        $coreSetting = DB::table('core_settings')->select('key','value')->get();
        $settings = array();
        if(!empty($coreSetting)){
            foreach ($coreSetting as $k => &$v) {
                $result = iunserializer($v->value);
                $settings[$v->key] = $result;
            }
        }
        $this->coreSetting = $settings;
    }

}
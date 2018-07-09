<?php
namespace App\ViewComposers;

use App\Libs\CommonUtils;
use Illuminate\View\View;

class AdminComposer
{
    protected $menus;
    protected $coreSetting;

    public function __construct()
    {
        $commonUtils = new CommonUtils();
        $this->menus = $commonUtils->getMenus();
        $this->coreSetting = $commonUtils->getCoreSetting();
    }

    /**
     * 绑定数据到视图.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            'menus' => $this->menus,
            'coreSetting' => $this->coreSetting,
        ]);
    }

}
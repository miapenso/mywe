<?php
namespace App\ViewComposers;

use App\Libs\CommonUtils;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminComposer
{
    protected $data;

    public function __construct(Request $request)
    {
        $this->data = new CommonUtils($request);
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
            'menus' => $this->data->menus,
            'coreSetting' => $this->data->coreSetting,
        ]);
    }

}
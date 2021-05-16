<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Box;

use App\Services\PjaxService;

class PercentController extends Controller
{
    public function index(Content $content)
    {
        /**
         * 取消 Pjax對js載入的影響
         */
        PjaxService::getInstance()->noPjax(__FUNCTION__);

        return $content
            ->title('百分比')
            ->description('檢視')
            ->body(new Box('', view('percent')));
    }
}

<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Box;

use App\Services\PjaxService;

class ReadMoreController extends Controller
{
    public function index(Content $content)
    {
        /**
         * 取消 Pjax對js載入的影響
         */
        PjaxService::getInstance()->noPjax(__FUNCTION__);

        return $content
            ->title('讀更多')
            ->description('檢視')
            ->body(new Box('', view('read_more')));
    }
}

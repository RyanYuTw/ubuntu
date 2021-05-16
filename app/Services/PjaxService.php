<?php

namespace App\Services;

class PjaxService
{
    protected static $_instance = null;

    protected function __construct()
    {
    }

    public static function getInstance()
    {
        if (self::$_instance == null) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    /**
     * 修正nopjax問題
     *
     * @param [type] $type
     * @return void
     */
    public function noPjax($type)
    {
        $request = \Request::instance();

        // 驗證錯誤發生的重導頁, 不可使用 x-pjax false
        if (basename($request->headers->get('referer')) == $type) {
            // do nothing
        } else {
            if ($request->headers->has("X-PJAX")) {
                $request->headers->set("X-PJAX", false);
            }
        }
    }
}

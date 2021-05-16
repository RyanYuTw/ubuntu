<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Form;
use Encore\Admin\Widgets\Box;

use App\Services\PjaxService;

use App\Models\Coupon;

class CouponController extends Controller
{
    public function index(Content $content)
    {
        /**
         * 取消 Pjax對js載入的影響
         */
        PjaxService::getInstance()->noPjax(__FUNCTION__);

        $form = new Form(new Coupon);
        $form->method('GET');
        $form->action('/examples/coupon');

        $form->disableSubmit();
        $form->disableReset();

        $form->text('title', '標題')->help('優惠主題');
        $form->dateRange('start_date', 'end_date', '起訖日期')->help('優惠起訖日期');
        $form->text('condition', '優惠條件')->help('例：滿1000元');
        $form->text('offer', '優惠內容')->help('例：折10元');
        // $form->tab('111', function ($form) {


        //     // $form->email('email');
        // })->tab('Profile', function ($form) {

        //     // $form->image('avatar');
        //     // $form->text('address');
        //     // $form->mobile('phone');
        // })->tab('Jobs', function ($form) {
        //     // $form->hasMany('jobs', function ($form) {
        //     //     $form->text('company');
        //     //     $form->date('start_date');
        //     //     $form->date('end_date');
        //     // });
        // });

        return $content
            ->title('優惠券')
            ->description('設定')
            ->body(new Box('', view('coupon')))
            ->body(new Box('', $form));
    }
}

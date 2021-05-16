<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');

    // 個人簡介
    $router->get('/profile', 'ProfileController@index');
    // 待辦事項拖拉頁面
    $router->get('/examples/drag_drop', 'DragAndDropController@index');
    // 待辦事項拖拉 API
    $router->put('/examples/drag_drop', 'DragAndDropController@statusUpdate');
    // 輪播圖頁面
    $router->get('/examples/carousel', 'CarouselController@index');
    // 百分比頁面
    $router->get('/examples/percent', 'PercentController@index');
    // 讀更多頁面
    $router->get('/examples/read_more', 'ReadMoreController@index');
    // 多層次選擇頁面-縣市區域為例
    $router->get('/examples/district', 'DistrictController@cascading');
    // 多層次選擇 API-取得區域資料
    $router->get('/examples/district/area', 'DistrictController@getArea')->name('district.area');
    // 影像裁切頁面
    $router->get('/examples/image_crop', 'ImageCropController@index');
    // 影像裁切 API
    $router->put('/examples/image_crop', 'ImageCropController@imageCrop');
    // 資料表格搜尋頁面
    $router->get('/examples/data_table', 'DataTableController@index');
    $router->post('/examples/data_table', 'DataTableController@getData');
    // 統計圖表頁面
    $router->get('/examples/charts', 'ChartController@index');
    // 圓餅圖 API
    $router->get('/examples/charts/pie', 'ChartController@pie');
    // 長條圖 API
    $router->get('/examples/charts/chart', 'ChartController@chart');
    // 線形圖 API
    $router->get('/examples/charts/line', 'ChartController@line');

    // 郵件管理
    $router->resource('/examples/mail', MailController::class);

    // 過濾器
    $router->resource('/examples/filter', FilterController::class);


    // 優惠券設定
    $router->get('/examples/coupon', 'CouponController@index');

    // 聊天室
    // $router->get('/examples/chat', 'ChatsController@index');
    // $router->get('/examples/chat/messages', 'ChatsController@fetchMessages');
    // $router->post('/examples/chat/messages', 'ChatsController@sendMessage');
});

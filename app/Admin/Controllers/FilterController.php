<?php

namespace App\Admin\Controllers;

use App\Models\TblContact;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class FilterController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '過濾器';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new TblContact());

        $grid->actions(function ($actions) {
            $actions->disableView();
        });
        // $grid->disableFilter();
        $grid->expandFilter();

        $grid->filter(function ($filter) {

            $filter->disableIdFilter();

            $filter->column(1 / 2, function ($filter) {
                $filter->like('first_name', '名字');
                $filter->like('last_name', '姓氏');
            });

            $filter->column(1 / 2, function ($filter) {
                $filter->like('address', '地址');
                $filter->like('email', '電子郵件');
            });
        });

        // app('view')->prependNamespace('admin', resource_path('views/admin'));

        $grid->column('id', '編號')->sortable();
        $grid->column('first_name', '名字')->sortable();
        $grid->column('last_name', '姓氏')->sortable();
        $grid->column('address', '地址')->sortable();
        $grid->column('email', '電子郵件')->sortable();

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(TblContact::findOrFail($id));

        $show->field('id', '編號');
        $show->field('first_name', '名字');
        $show->field('last_name', '姓氏');
        $show->field('address', '地址');
        $show->field('email', '電子郵件');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new TblContact());

        $form->tools(function (Form\Tools $tools) {
            $tools->disableList();
        });

        $form->footer(function ($footer) {
            $footer->disableViewCheck();
            $footer->disableEditingCheck();
            $footer->disableCreatingCheck();
        });

        $form->text('first_name', '名字');
        $form->text('last_name', '姓氏');
        $form->text('address', '地址');
        $form->email('email', '電子郵件');

        return $form;
    }
}

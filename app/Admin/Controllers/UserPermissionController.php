<?php

namespace App\Admin\Controllers;

use App\Entities\UserPermission;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserPermissionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Entities\UserPermission';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new UserPermission);

        $grid->column('id', __('Id'));
        $grid->column('user_function', __('User function'));
        $grid->column('read', __('Read'));
        $grid->column('write', __('Write'));
        $grid->column('execute', __('Execute'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(UserPermission::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_function', __('User function'));
        $show->field('read', __('Read'));
        $show->field('write', __('Write'));
        $show->field('execute', __('Execute'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new UserPermission);

        $form->textarea('user_function', __('User function'));
        $form->textarea('read', __('Read'));
        $form->textarea('write', __('Write'));
        $form->textarea('execute', __('Execute'));

        return $form;
    }
}

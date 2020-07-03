<?php

namespace App\Admin\Controllers;

use App\Entities\News;
use App\Entities\NewsCategory;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class NewsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '最新消息';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new News);

        $grid->column('id', __('Id'));
        $grid->column("newsCategory.type",'訊息分類');
        $grid->column('title', __('主題'));
        $grid->column('release', __('發怖時間'));
        $grid->column('content', __('內容'));
        $grid->column('status', __('啟用狀態'));
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
        $show = new Show(News::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('release', __('Release'));
        $show->field('status', __('Status'));
        $show->field('content', __('Content'));
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
        $form = new Form(new News);
        $Category = NewsCategory::get()->pluck('type', 'id');
        $form->text('title', __('主題'));
        $form->select('news_category_id', '訊息分類')->options($Category);
        $form->datetime('release', __('發怖時間'))->default(date('Y-m-d H:i:s'));
        $form->summernote('content', __('內容'));
        $form->switch('status', __('啟用狀態'))->default(0);
        
        return $form;
    }
}

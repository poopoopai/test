<?php

namespace App\Admin\Controllers;

use App\Entities\Product;
use App\Entities\ProductCategory;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductContoller extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '產品選擇';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product);

        $grid->column('id', __('ID'))->sortable();
        $grid->column("productCategory.type", "分類種類");
        $grid->column('name', __('產品名稱'));
        $grid->column('status', __('上架狀態'));
        $grid->column('description', __('描述'));
        $grid->column('image', __('圖片'));

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
        $show = new Show(Product::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Product);
        $Category = ProductCategory::get()->pluck('type', 'id');
        $form->select('product_category_id', '分類種類')->options($Category);
        $form->text('name', "產品名稱")->rules('required');
        $form->image('image', "圖片")->uniqueName();
        $form->textarea('description', "描述");
        $form->switch('status', "上架狀態")->default(0);;

        return $form;
    }
}

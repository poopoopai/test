<?php

namespace App\Admin\Controllers;

use App\Entities\Product;
use App\Entities\ProductCategory;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Repositories\ProductRepository;
// use App\Admin\Actions\Replicate;
// use App\Admin\Actions\BatchReplicate;

class ProductContoller extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '產品選擇';

    protected $category;
    protected $ProductRepository;

    public function __construct(ProductRepository $ProductRepository)
    {
        // 產品分類
        $this->ProductRepository = $ProductRepository;
        $this->category = ProductCategory::get()->pluck('type', 'id');
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product);
        $grid->fixColumns(2); // 可固定欄位 第一個變數固定前面爛位 第二個變數固定後面欄位預設-1
        $grid->column('id', __('ID'))->sortable();
        $grid->column("productCategory.type", "分類種類")->help('这一列是...');
        $grid->column('name', __('產品名稱'))->replace(['happy' => 'mad'])->copyable();
        $grid->column('status', __('上架狀態'))->display( function ($status) {
            return ($status) ? "<span class=\"badge label-success\">ON</span>" : "<span class=\"badge label-danger\">OFF</span>";
        });
        $grid->column('description')->badge('success');
        
        $grid->column('image' , '圖片')->image(url('/').'/storage/', 100, 100);
        $grid->quickSearch(['description', 'name']);

        
        $grid->filter( function ($filter) {
            $filter->where(function ($query) {
                switch ($this->input) {
                    case '1':
                        $query->where('status', 1);
                        break;
                    case '0':
                        $query->where('status', 0);
                        break;
                }
            }, '上架狀態')->radio([
                '1' => '是',
                '0' => '否',
            ]);
        });
     
        // $grid->actions(function ($actions) {
        //     $actions->add(new Replicate);
        // });
        // $grid->batchActions(function ($batch) {
        //     $batch->add(new BatchReplicate());
        // });
        
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

        $show->field('image','图片')->image(url('/').'/storage/');

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
        
        $form->select('product_category_id', '分類種類')->options($this->category);
      
        $form->text('productCategory', "產品名稱");
        $form->multipleImage('image', "圖片")->removable()->sortable()->uniqueName();
        $form->textarea('description', "描述");
        $form->switch('status', "上架狀態")->default(0);;
        
        return $form;
    }
}

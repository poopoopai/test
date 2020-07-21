<?php

namespace App\Admin\Controllers;

use App\Entities\CategoryTree;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Tree;
use Encore\Admin\Layout\Content;

class CategoryTreeController extends AdminController
{

    // use ModelForm;
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '樹狀';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */

    public function index(Content $content)
    {
        $tree = new Tree(new CategoryTree);

        return $content
            ->header('树状模型')
            ->body($tree);
    }

    protected function tree()
    {
        return CategoryTree::tree(function (Tree $tree) {
            $tree->branch(function ($branch) {
                return "{$branch['title']}";
            });
        });
    }

 


    protected function grid()
    {
        $grid = new Grid(new CategoryTree);

        $grid->column('id', __('Id'));
        $grid->column('parent_id', __('Parent id'));
        $grid->column('order', __('Order'));
        $grid->column('title', __('Title'));
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
        $show = new Show(CategoryTree::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('parent_id', __('Parent id'));
        $show->field('order', __('Order'));
        $show->field('title', __('Title'));
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
        $form = new Form(new CategoryTree);

        $form->select('parent_id', trans('admin.parent_id'))->options(CategoryTree::selectOptions())->required();
        // $form->text('order', __('Order'));
        $form->text('title', __('Title'));

        return $form;
    }

    

    
    
}

<?php

namespace App\Entities;

use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\AdminBuilder;

class CategoryTree extends Model
{
    use ModelTree, AdminBuilder;

    protected $table = 'category_trees';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setParentColumn('parent_id');
        $this->setOrderColumn('order');
        $this->setTitleColumn('title');
    }
}

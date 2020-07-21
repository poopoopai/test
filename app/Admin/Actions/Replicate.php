<?php

namespace App\Admin\Actions;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;

class Replicate extends RowAction
{
    public $name = '複製';

    public function handle(Model $model)
    {
        $model->replicate()->save();

        return $this->response()->success('複製成功')->refresh();
    }

   

}
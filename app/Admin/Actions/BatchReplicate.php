<?php

namespace App\Admin\Actions;

use Encore\Admin\Actions\BatchAction;
use Illuminate\Database\Eloquent\Collection;

class BatchReplicate extends BatchAction
{
    public $name = '批量复制';

    public function handle(Collection $collection)
    {
        foreach ($collection as $model) {
            $model->replicate()->save();
        }

        return $this->response()->bottomCenter()->success('Success message...')->refresh();
    }

    

    // public function handle(Collection $collection, Request $request)
    // {
    //     foreach ($collection as $model) {
    //         // 
    //     }

    //     return $this->response()->success('举报已提交！')->refresh();
    // }

    // public function form()
    // {
    //     $this->checkbox('type', '类型')->options([]);
    //     $this->textarea('reason', '原因')->rules('required');
    // }

    // public function html()
    // {
    //     return "<a class='report-posts btn btn-sm btn-danger'><i class='fa fa-info-circle'></i>举报</a>";
    // }
    public function dialog()
    {
        $this->confirm('確定複製');
    }

    

}
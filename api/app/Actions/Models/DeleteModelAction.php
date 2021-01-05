<?php


namespace App\Actions\Models;

use App\Model;

class DeleteModelAction
{
    public function execute(Model $model)
    {
        $model->delete();
        return true;
    }
}

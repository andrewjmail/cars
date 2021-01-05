<?php


namespace App\Actions\Makes;

use App\Make;

class DeleteMakeAction
{
    public function execute(Make $make)
    {
        $make->delete();
        return true;
    }
}

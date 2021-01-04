<?php


namespace App\Actions;


use App\Make;

class DeleteMakeAction
{
    public function execute(Make $make)
    {
        $make->delete();
        return true;
    }
}

<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class OrderCommentService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'OrderCommentService';
    }
}

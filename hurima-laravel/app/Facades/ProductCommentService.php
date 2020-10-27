<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class ProductCommentService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ProductCommentService';
    }
}

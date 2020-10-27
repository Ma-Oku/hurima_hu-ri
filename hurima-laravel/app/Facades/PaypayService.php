<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class PaypayService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PaypayService';
    }
}

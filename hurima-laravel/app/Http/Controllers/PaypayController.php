<?php

namespace App\Http\Controllers;

use PaypayService;
//use Illuminate\Http\Request;


class PaypayController extends Controller
{
    public function create($order_id)
    {
        return PaypayService::create($order_id);
    }

    public function getdetails($order_id)
    {
        return PaypayService::getdetails($order_id);
    }

    public function deleted($codeid)
    {
        return PaypayService::delete($codeid);
    }

    public function recreate($id)
    {
        return PaypayService::recreate($id);
    }
}

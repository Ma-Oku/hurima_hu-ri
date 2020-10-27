<?php
namespace App\Services;

use App\Models\Order;
use App\Models\PaymentPaypay;
use App\Models\Product;
use App\Models\UserEvaluate;
use App\Facades\PaypayService;
use DB;

class OrderService {

    public function store($request)
    {
        $product_id = $request->product_id;
        $buyer = auth()->user();
        $product = Product::find($product_id)->load('user');

        if ($product->sales_status == 0) {
            if($product->user_id != $buyer->id){

                DB::beginTransaction();
                try {
                    $order = new Order;

                    $order->buyer_id = $buyer->id;
                    $order->buyer_name = $buyer->real_name;
                    $order->buyer_address = $buyer->address;
                    $order->buyer_postal_code = $buyer->postal_code;
                    $order->buyer_phone_number = $buyer->phone_number;

                    $order->seller_id = $product->user_id;
                    $order->seller_name = $product->user->real_name;
                    $order->seller_address = $product->user->address;
                    $order->seller_postal_code = $product->user->postal_code;
                    $order->seller_phone_number = $product->user->phone_number;

                    $order->product_id = $product_id;
                    $order->product_name = $product->product_name;
                    $order->product_price = $product->product_price;
                    $order->trade_status = 1;
                    $order->save();

                    $product->sales_status = 1;
                    $product->save();

                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                }
            }
        }
    }

    public function show($id)
    {
        return Order::find($id)->load(['user:id,name','user_buy:id:name','product:id,product_file','order_comments'
        => function ($query) {
            $query->orderBy('created_at')->with('user:id,name');
        }]);
    }

    public function update($request, $id)
    {
        $order = Order::find($id);

        if ($request->trade_status == 2) {

            $paypay_detail = PaypayService::getdetails($id);

            if( $paypay_detail['status'] == 'COMPLETED') {
                $payment = PaymentPaypay::where('payment_id', $id)->first();
                DB::beginTransaction();
                try {
                    $payment->status = $paypay_detail['status'];
                    $payment->save();
                    $order->trade_status = $request->trade_status;
                    $order->pay_status = 1;
                    $order->save();
                    DB::commit();
                    return $paypay_detail;
                } catch (\Exception $e) {
                    DB::rollBack();
                }
            } else {
                return $paypay_detail;
            }
        }


        if ($request->trade_status == 3) {
            $order->trade_status = $request->trade_status;
            $order->save();
        }

        if ($request->trade_status == 4) {
            $order->trade_status = $request->trade_status;
            $order->buyer_comment = $request->buyer_comment;
            $order->buyer_evaluate = $request->buyer_evaluate;
            $order->save();
        }

        if ($request->trade_status == 5) {
            DB::beginTransaction();
            try {
                $order->trade_status = 6;
                $order->seller_comment = $request->seller_comment;
                $order->seller_evaluate = $request->seller_evaluate;
                $order->save();

                $evalute1 = new UserEvaluate;
                $evalute1->valuer_id = $order->buyer_id;
                $evalute1->evaluatee_id = $order->seller_id;
                $evalute1->comment = $order->buyer_comment;
                $evalute1->evaluate = $order->buyer_evaluate;
                $evalute1->save();

                $evalute2 = new UserEvaluate;
                $evalute2->valuer_id = $order->seller_id;
                $evalute2->evaluatee_id = $order->buyer_id;
                $evalute2->comment = $request->seller_comment;
                $evalute2->evaluate = $request->seller_evaluate;
                $evalute2->save();

                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
            }
        }

        //公開用の支払い無視でのステータス移動
        if ($request->trade_status == 7) {
            $order->trade_status = 2;
            $order->save();
        }
    }

    public function buylist()
    {
        $user_id = auth()->user()->id;
        return Order::where('buyer_id', $user_id)->with('product:id,product_file')->get();
    }

    public function selllist()
    {
        $user_id = auth()->user()->id;
        return Order::where('seller_id', $user_id)->with('product:id,product_file')->get();
    }

    public function pay($id)
    {
        $order = Order::find($id);

        DB::beginTransaction();
        try{
            $pay = PaypayService::create($id);
            $order->pay_status = 0.1;
            $order->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $pay = null;
        }
        return $pay;
    }
}

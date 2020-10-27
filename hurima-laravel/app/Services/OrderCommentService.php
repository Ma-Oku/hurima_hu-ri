<?php
namespace App\Services;

use App\Models\Order;
use App\Models\OrderComment;

class OrderCommentService {

    public function store($request)
    {
        $order = Order::find($request->order_id);
        $user_id = auth()->user()->id;

        if( $order->buyer_id == $user_id || $order->seller_id == $user_id) {
            $order_comment = new OrderComment;
            $order_comment->order_id = $request->order_id;
            $order_comment->user_id = auth()->user()->id;
            $order_comment->order_comment = $request->order_comment;
            $order_comment->save();
        }
    }
}

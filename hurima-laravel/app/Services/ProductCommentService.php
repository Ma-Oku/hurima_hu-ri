<?php
namespace App\Services;

use App\Models\ProductComment;

class ProductCommentService {

    public function store($request)
    {
        $product_comment = new ProductComment;
        $product_comment->product_id = $request->product_id;
        $product_comment->user_id = auth()->user()->id;
        $product_comment->product_comment = $request->product_comment;
        $product_comment->save();
    }
}

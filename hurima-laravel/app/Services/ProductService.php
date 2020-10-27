<?php
namespace App\Services;

use App\Models\Product;

class ProductService {

    public function show($id)
    {
        return Product::find($id)->load(['user:id,name','product_comments' => function ($query) {
            $query->orderBy('created_at')->with('user:id,name');
        }]);
    }

    public function store($request)
    {
        $file_name = request()->product_file->getClientOriginalName();
        request()->product_file->storeAs('public',$file_name);

        $product = new Product;
        $product->user_id = auth()->user()->id;
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_file = 'storage/'.$file_name;
        $product->send_time = $request->send_time;
        $product->category = $request->category;
        $product->product_explanation = $request->product_explanation;
        $product->region_shipping = $request->region_shipping;
        $product->save();
    }

    public function update($request, $id)
    {
        $product = Product::find($id);

        if ($product->user_id === auth()->user()->id && $product->sales_status !== 1) {
            $product->product_name = $request->product_name;
            $product->product_price = $request->product_price;
            $product->send_time = $request->send_time;
            $product->category = $request->category;
            $product->product_explanation = $request->product_explanation;
            $product->region_shipping = $request->region_shipping;
            $product->save();
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product->user_id === auth()->user()->id && $product->sales_status !== 1) {
            $product->delete();
        }
    }

    public function putonproduct($user_id)
    {
        return Product::where('user_id', $user_id)->get();
    }

    public function newproduct()
    {
        return Product::orderBy('updated_at', 'desc')->paginate(4);

    }

    public function searchproduct($request)
    {
        $search = $request->search;
        $paginate = $request->quantity;
        $category = $request->category;
        $product = Product::where('product_name', 'like', "%$search%");

        if($category !== '全て') {
            $product->where('category', $category);
        }

        return $product->paginate($paginate);

    }

    public function random()
    {
        return Product::inRandomOrder()->take(12)->get();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Comment;
use Validator;

class ProductController extends Controller
{
    public function createData(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'product_name' => 'required',
            'price' => 'required|numeric',
            'desc_product' => 'required|max: 100'
        ]);

        if($validator->fails()){
            return response()->json([
                'error' => $validator->errors()
            ]);
        }

        Product::create([
            'name' => $request->product_name,
            'price' => $request->price,
            'desc' => $request->desc_product
        ]);

        return response()->json([
            'message' => 'success create data'
        ]);
    }

    public function getAllData()
    {
        $products = Product::all();
        return response()->json([
            'products' => $products
        ]);
    }

    // public function searchData(Request $request)
    // {
    //     $products = Product::where('name', 'LIKE', '%' .$request->product_name. '%')->get();
    //     return response()->json([
    //         'productSearch' => $products
    //     ]);
    // }

    public function updateAllData(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'product_name' => 'required',
            'price' => 'required|numeric',
            'desc_product' => 'required|max: 100'
        ]);

        if($validator->fails()){
            return response()->json([
                'error' => $validator->errors()
            ]);
        }

        Product::findOrFail($id)->update([
            'name' => $request->product_name,
            'price' => $request->price,
            'desc' => $request->desc_product
        ]);

        return response()->json([
            'message' => 'success update data'
        ]);
    }


    public function updateData(Request $request, $id)
    {
        
        Product::where('id', $id)->update([
            'price' => $request->price
        ]);
        
        return response()->json([
            'message' => 'success update data'
        ]);

    }


    public function deleteData($id)
    {
        Product::destroy($id);
        return response()->json([
            'message' => 'success delete data'
        ]);
    }

    public function showProduct($id)
    {
        $products = Product::findOrFail($id);
        return response()->json([
            'products' => $products
        ]);
    }

    public function show($productId, $commentId)
    {
        $comments = Comment::where([['product_id', $productId],['id', $commentId]])->first('body');

        return response()->json([
            'product.comment' => $comments->body
        ]);
    }

    public function getData(Product $key)
    {
        return $key;
    }

}
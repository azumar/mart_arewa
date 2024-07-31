<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function getProductForm()
    {
        return view('admin.manage-product');
    }
    public function store(Request $request)
    {
       // dd($request['subCatId']);
        // $request->validate([
           
        //     'product_code' => 'required|string',
        //     'product_name' => 'required|string',
        //     'shop_id' => 'required|string',
        //     'short_description' => 'nullable|string',
        //     'long_description' => 'nullable|string',
        //     'product_qty' => 'required|integer',
        //     'product_price' => 'required|numeric',

        //     'product_image' => 'nullable|image|max:2048'
        // ]);
        $product = new Product();
        $product->sub_category_id = $request->subCatId;
        $product->product_code = $request->product_code;
        $product->product_name = $request->product_name;
        $product->shop_id = $request->shop_id;
        $product->product_status = "available";
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->product_qty = $request->product_qty;
        $product->product_price =  $request->product_price;

        //dd($product);


        // if ($request->hasFile('product_image')) {
        //     $product->product_image = $request->file('product_image')->store('product_images', 'public');
        // }

        $product->save();

        return redirect()->back()->with('success', 'New shop created!');
    }

}

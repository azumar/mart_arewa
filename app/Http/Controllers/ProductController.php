<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function getProductBySubCat(Request $request){
        $subCatId = $request->id;
        $products  = Product::where('sub_category_id', $subCatId)->get();
       // dd($products); 
        return view('products-by-subcat', ['products'=> $products]);
    }
    public function productDetails(Request $request){
        $productId = $request->id;
        $product  = Product::find($productId)->first();
        //dd($product );
        return view('seller.product-detail', ['product' =>$product  ]);

    }
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
        $product->product_price = $request->product_price;

        //dd($product);


        if ($request->hasFile('product_image')) {
            $prodpic = time() . '.' . $request->product_image->getClientOriginalExtension();
            $request->product_image->move(public_path('products'), $prodpic);
            $product->product_image = $prodpic;
        }

        $product->save();

        return redirect()->back()->with('success', 'New shop created!');
    }

}

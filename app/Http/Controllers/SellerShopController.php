<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\SellerShop;
use App\Models\Product;



class SellerShopController extends Controller
{

    public function getProductsByShop(Request $request){
        $shopId = $request->id;
        $shop  = SellerShop::find($shopId)->first();
        //dd($shop);
        $products = Product::where('shop_id', $shopId  )->get();
        $subcats = SubCategory::all();
        return view ('seller.shop-products', ['products' => $products, 'subCategories'=>$subcats, 'shop'=>$shop]);
    }
    public function store(Request $request)
{
    $request->validate([
        'seller_id' => 'required|integer',
        'shop_name' => 'required|string|max:255',
        'shop_description' => 'required|string|max:255',
        'shop_location' => 'required|string|max:255',
    ]);

    $shop = new SellerShop();
    $shop->seller_id = $request->seller_id;
    $shop->shop_name = $request->shop_name;
    $shop->shop_description = $request->shop_description;
    $shop->shop_location = $request->shop_location;
    $shop->save();

    return redirect()->back()->with('success', 'New shop created!');
}

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Buyer;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', ['cart' => $cart]);
    }

    public function checkout(Request $request)
    {

        if (Auth::check()) {

            $user = Auth::user(); // Access authenticated user data
            $cart = session()->get('cart', []);

            if (empty($cart)) {
                return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
            }

            $total = 0;
            foreach ($cart as $item) {
                $total += $item['price'] * $item['quantity'];
            }
        } elseif ($request->has('buyer_name')) {
            //dd($request);
            DB::transaction(
                function () use ($request) {
                    $buyer = new Buyer();
                    $buyer->buyer_name = $request->input('buyer_name');
                    $buyer->buyer_address = $request->input('buyer_address');
                    $buyer->buyer_contact = $request->input('buyer_contact');
                    $buyer->buyer_email = $request->input('buyer_email');
                    $buyer->buyer_password = $request->input('buyer_password');
                    $buyer->buyer_password_confirm = $request->input('buyer_password_confirm');
                    $buyer->save();

                    $user = new User();
                    $user->name = $request->input('buyer_name');
                    $user->email = $request->input('buyer_email');
                    $user->password = $request->input('buyer_password');
                    $user->save();
                    $cart = session()->get('cart', []);

                if (empty($cart)) {
                    return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
                } else {
                    //dd($cart);
                    $total = 0;
                    foreach ($cart as $item) {
                        $total += $item['price'] * $item['quantity'];
                    }
                    //dd($buyer->id);
                    $order = new Order();
                    $order->buyer_id = $buyer->id;
                    $order->order_total = $total;
                    $order->save();
                }
                }
            );


        } else {
            return redirect()->route('buyers.registration')->with('error', 'Your cart is empty.');
        }


    }

    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);
        //dd( $quantity);

        // Retrieve the product from the database
        $product = Product::find($productId);

        if (!$product) {
            return redirect()->route('cart.index')->with('error', 'Product not found!');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            $cart[$product->id] = [
                "name" => $product->product_name,
                "quantity" => $quantity,
                "price" => $product->product_price,
                "photo" => $product->product_image
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }
    public function update(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $quantity;
            session()->put('cart', $cart);
            return redirect()->route('cart.index')->with('success', 'Cart updated!');
        }

        return redirect()->route('cart.index')->with('error', 'Product not found in cart!');
    }
    public function remove(Request $request)
    {
        $productId = $request->input('product_id');

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
            return redirect()->route('cart.index');
        }

        return redirect()->route('cart.index')->with('error', 'Product not found in cart!');
    }

}

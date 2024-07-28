<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SellerController extends Controller
{

    public function sellerHome()
    {
     
        return view('seller.dashboard');
    }
    public function sellerRegForm()
    {
        return view('seller.registration');
    }
    public function storeSeller(Request $request)
    {

        DB::transaction(
            function () use ($request) {

                $seller = new Seller();
                $seller->seller_name = $request->input('seller_name');
                $seller->seller_address = $request->input('seller_address');
                $seller->seller_contact = $request->input('seller_contact');
                $seller->seller_email = $request->input('seller_email');
                $seller->seller_password = $request->input('seller_password');
                $seller->seller_password_confirm = $request->input('seller_password_confirm');
                $seller->save();

                $user = new User();
                $user->name = $request->input('seller_name');
                $user->email = $request->input('seller_email');
                $user->password = $request->input('seller_password');
                $user->save();

            }
        );
         // Redirect the user back with a success message
         return redirect()->back()->with('success', 'Application received successfully!');
    }



}

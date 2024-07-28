<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Seller;

class LoginController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function showWarning()
    {
        return view('warning');
    }
    public function show()
    {
        return view('auth.login');
    }
    public function warnIntrusion()
    {
        return view('auth.warn');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            //dd($user);
            session(['isSeller' => false]);
            session(['isBuyer' => false]);
            session(['isAdmin' => false]);

            $seller = Seller::where('seller_email', $user->email)->first() ?? null;
           // dd($seller);
           if ($seller) {
            session(['isSeller' => true]);
        }

           if (session('isSeller')) {
            //dd(session('isSeller'));
            return redirect('/seller/seller-home');
        } 
        }
        else {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }
}
}
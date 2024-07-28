<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    public function generalHome (){

        
        $categories = Category::all(); 
        return view('home', ['categories'=>$categories]);
    }
    public function getCategories (){
        return view('category');
    }
}

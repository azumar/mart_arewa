<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProductForm (){
        return view ('admin.manage-product');
    }
}

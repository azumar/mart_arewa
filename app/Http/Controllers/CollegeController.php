<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollegeController extends Controller
{
    public function getCollegeForm(){
        return view ('college.manage-college');
    }
}

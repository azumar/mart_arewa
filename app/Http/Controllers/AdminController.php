<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addCategories (){

        $categories = Category::all(); 
        return view ('admin.manage-categories', ['categories'=>$categories]);
    }

    public function getSubCategories (Request $request){
        
        $category = Category::find($request->id);
        $subCategories = SubCategory::where('sub_category_id', $request->id )->get();
        //dd($subCategories );
        

        
        return view ('admin.manage-sub-cat', ['category'=>$category, 'subCategories' =>$subCategories]);
    }
    public function addNewCategory(Request $request){
        $category = new Category();
        $category->category_code = $request->input('category_code');
        $category->category_name = $request->input('category_name');
        $category->category_description = $request->input('category_description');
        $catpic = time() . '.' . $request->category_image->getClientOriginalExtension();
        $request->category_image->move(public_path('pictures'), $catpic);
        $category ->category_image = $catpic;
        $category->save();
        return back()->with('success', 'New category has been added successfully.');

    }
    public function addNewSubCategory(Request $request){
        $subCategory = new SubCategory();
        $subCategory->sub_category_name = $request->input('sub_category_name');
        $subCategory->sub_category_description = $request->input('sub_category_description');
        $catpic = time() . '.' . $request->sub_category_image->getClientOriginalExtension();
        $request->sub_category_image->move(public_path('pictures'), $catpic);
        $subCategory ->sub_category_image = $catpic;
        $subCategory->sub_category_Id =$request->input('category_id');
        $subCategory->sub_category_slug =$request->input('sub_category_slug');
        $subCategory->save();
        return back()->with('success', 'New  sub category has been added successfully.');

    }
}

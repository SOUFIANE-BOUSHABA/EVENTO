<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function showCategory(){

        $categories = Category::all();
        return view('backoffice.categories' , compact('categories'));
    }
    public function storeCategory(Request $request){
        $request->validate([
            'name' => 'required'
        ]);

        $category = Category::create([
            'name' => $request->name
        ]);
        return redirect()->back();
    }

    public function deleteCategory($id){
        $category = Category::find($id);
        $category->delete();
        return redirect()->back();
    }

    public function editCategory(Request $request, $id){
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect()->back();
    }
}

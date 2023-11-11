<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::paginate(10);
        return view('admin.category.category',compact('categories'));
    }
    
    public function AddCat(Request $request) {
        $validates = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ]);
        
        Category::create([
            'category_name' =>$request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->back()->with('success','Category Inserted Successfully');
    }

    public function Edit($id) {
        $categories = Category::find($id);
        return view('admin.category.edit',compact('categories'));
    }
    
    
    
    public function Update(Request $request, $id) {
        $categories = Category::find($id)->update([
            'category_name' =>$request->category_name,
            'user_id' => Auth::user()->id,
        ]);
        return Redirect()->route('AllCat')->with('success','Category Inserted Successfully');
    }
    
    public function Delete(Request $request, $id) {
        Category::find($id)->delete();
        return Redirect()->route('AllCat')->with('success','Category Deleted Successfully');
    }
}

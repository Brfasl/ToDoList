<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

        $categories = Category::get();

        return view('panel.categories.index',compact('categories'));

    }

    public function createPage(){

        return view('panel.categories.create');

    }
    public function postCategory(Request $request){
        $cat=new Category();
        $cat->name = $request->category_name;
        $cat->is_active = $request->category_status;
        $cat->save();

        return redirect() -> route('panel.categoryIndex')->with(['success' => 'Kategori başarıyla oluşturuldu.']);

    }
    public function updatePage(){

        return view('panel.categories.update');
    }

}


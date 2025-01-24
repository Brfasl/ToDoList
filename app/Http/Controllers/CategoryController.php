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
    public function updatePage($a){
        //where('sutunAdi','neAraniyor')

        //$category=Category::where('id',$a)->first(); DOĞRU
        //$category=Category::where('id',$a)->get();  YANLIŞ veritabanın tamamını tarar.
        $category=Category::find($a);//firstün kısaltılmışı


        return view('panel.categories.update',compact('category'));

    }
    public function updateCategory(Request $request)
    {
       // dd($request->all());

        $request->validate([
            'catStatus' => 'min:0|max:1',
            'catName' => 'min:3|max:50',
        ]);
        $category=Category::find($request->catID);
        if ($category!=null) {
            $category->name=$request->catName;
            $category->is_active=$request->catStatus;
            $category->save();

            return redirect() -> route('panel.categoryIndex')->with(['success' => 'Kategori başarıyla güncellendi.']);

        }
        else{
            return redirect() -> route('panel.categoryIndex')->with(['error' => 'Bir hata oluştu! Lütfen tekrar deneyiniz.']);
        }

    }
    public function updateCategoryTest($id,Request $request)
    {
        dd($id ,$request->all());

        $category=Category::find($id);
    }

}


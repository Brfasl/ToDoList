<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(){

        $categories = Category::where('user_id', Auth::id())->get();

        return view('panel.categories.index',compact('categories'));

    }

    public function createPage(){

        return view('panel.categories.create');

    }
    public function postCategory(Request $request){
        $cat=new Category();
        $cat->name = $request->category_name;
        $cat->is_active = $request->category_status;
        //dd(Auth::user());
        //dd(Auth::id());
        // dd(Auth::check());//kişi auth olmuş mu?
        $cat->user_id = Auth::id();;
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
            'catName' => 'min:3|max:50|required'
        ]);
        $category=Category::find($request->catID);
        if ($category!=null) {
            $category->name=$request->catName;
            $category->is_active=$request->catStatus;
            $category->save();

            return redirect() -> route('panel.categoryIndex')->with(['success' => 'Kategori başarıyla güncellendi.']);

        }
        else{
            return redirect() -> route('panel.categoryIndex')->with(['errors' => 'Bir hata oluştu! Lütfen tekrar deneyiniz.']);
        }

    }
    public function updateCategoryTest($id,Request $request)
    {
        dd($id ,$request->all());

        $category=Category::find($id);
    }

    public function categoryDelete($id){
        $category=Category::find($id);
        if ($category ->deleted_at ==null) {
            $category->delete();
            return redirect() -> route('panel.categoryIndex')->with(['success' => 'Kategori başarıyla silindi.']);
        }else{
            return redirect() -> route('panel.categoryIndex')->with(['error' => 'Hata oluştu!']);
        }




    }

}


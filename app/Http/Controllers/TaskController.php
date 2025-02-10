<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function createPage(){
        $categories = Category::where('user_id',Auth::user()->id)->get();

        return view('panel.tasks.create',compact('categories'));

    }
    public  function addTask(Request $req)
    {
        //dump and die yani veriyi fırlat ve işlemi durdur
       //dd($req->all());
        //validasyon, doğrulama
        $req->validate([
            'title'=>'required|max:15|min:3'
        ]);

        $task =new Task();
        $task->category_id= $req->category;
        $task->title = $req->title;
        $task->content = $req->content;
        $task->status = $req->status;
        $task->deadline = $req->deadline;
        $task->save();

        return redirect()->route('panel.indexTask')->with(['success','Görev başarıyla eklendi!']);

    }
    public function indexPage(){

        $tasks = Task::first();
        $kategori = $tasks->getCategory;
        dd($kategori->getUser);
        return view('panel.tasks.index');
    }
}

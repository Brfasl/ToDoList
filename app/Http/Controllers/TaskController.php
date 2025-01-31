<?php

namespace App\Http\Controllers;


use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function createPage(){
        return view('panel.tasks.create');

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
        dd($task);
        $task->category_id=1;
        $task->title = $req->title;
        $task->conted = $req->content;
        $task->status = $req->status;
        $task->deadline = $req->deadline;
        $task->save();
        return 'başarılı';
    }
}

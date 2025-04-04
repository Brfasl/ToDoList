<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // Eğer kullanıcı giriş yapmamışsa login sayfasına yönlendir
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Tüm kategorileri ve taskları al
        $categories = Category::all();
        $tasks = Task::all();

        return view('panel.home', compact('categories', 'tasks'));
    }



}

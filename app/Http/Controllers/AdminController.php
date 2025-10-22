<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Post;

class AdminController extends Controller
{
    public function users(){
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function posts(){
        $posts = Post::with('user','category')->latest()->get();
        return view('admin.posts', compact('posts'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->take(10)->get();

        $postCount      = Post::all()->count();
        $categoryCount  = Category::all()->count();
        $tagCount       = Tag::all()->count();
        $userCount      = User::all()->count();

        return view('admin.dashboard.index', compact(['posts', 'postCount', 'categoryCount' , 'tagCount', 'userCount']));
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
}

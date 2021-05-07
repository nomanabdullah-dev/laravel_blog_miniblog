<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use function GuzzleHttp\Promise\all;

class FrontEndController extends Controller
{
    public function home()
    {
        $posts = Post::with('category','user')->orderBy('created_at','DESC')->take(5)->get();
        $firstPosts2 = $posts->splice(0, 2);
        $middlePost  = $posts->splice(0, 1);
        $lastPosts   = $posts->splice(0);

        $footerPosts        = Post::with('category','user')->inRandomOrder()->take(4)->get();
        $firstFooterPosts   = $footerPosts->splice(0, 1);
        $firstFooterPosts2  = $footerPosts->splice(0, 2);
        $lastFooterPost     = $footerPosts->splice(0, 1);

        $recentPosts = Post::with('category','user')->orderBy('created_at','DESC')->paginate(9);

        return View('website.home', compact(['posts', 'recentPosts', 'firstPosts2', 'middlePost', 'lastPosts', 'firstFooterPosts', 'firstFooterPosts2', 'lastFooterPost']));
    }

    public function about()
    {
        $user = User::first();
        return View('website.about', compact('user'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        if ($category) {
            $posts = Post::where('category_id', $category->id)->paginate(9);

            return View('website.category', compact(['category','posts']));
        }else{
            return redirect()->route('website');
        }
    }

    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->first();;
        if ($tag) {
            $posts = $tag->posts()->orderBy('created_at', 'desc')->paginate(9);
            return View('website.tag', compact(['tag','posts']));
        }else{
            return redirect()->route('website');
        }
    }

    public function contact()
    {
        return View('website.contact');
    }
    public function post($slug)
    {
        $post = Post::with('category','user')->where('slug',$slug)->first();
        $posts =Post::with('category','user')->inRandomOrder()->take(3)->get();

        //more related post
        $relatedPosts       = Post::orderBy('category_id', 'DESC')->inRandomOrder()->take(4)->get();
        $firstrelatedPost   = $relatedPosts->splice(0, 1);
        $firstrelatedPosts2 = $relatedPosts->splice(0, 2);
        $lastrelatedPosts   = $relatedPosts->splice(0, 1);

        $categories = Category::all();
        $tags = Tag::all();

        if ($post) {
            return View('website.post', compact(['post', 'posts', 'categories', 'tags', 'firstrelatedPost', 'firstrelatedPosts2', 'lastrelatedPosts']));
        }else{
            return redirect('/');
        }
    }


    //Front End Message
    public function send_message(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required|max:200',
            'email'     => 'required|email|max:200',
            'subject'   => 'required|max:255',
            'message'      => 'required|min:100',
        ]);

        $contact = Contact::create($request->all());

        Session::flash('send-message','Contact message send successfully');
        return redirect()->back();
    }
}

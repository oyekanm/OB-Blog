<?php

namespace App\Http\Controllers;

// use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = auth()->user()->id;
       
        // $post = Post::where('userId',$id)->get();
        $post = User::find($id)->posts;
        // dd($post);
        // return $post->posts;
        return view('Dashboard.index')->with("posts",$post);
    }
    public function destroy()
    {
        $id = auth()->user()->id;
       
        // $post = Post::where('userId',$id)->get();
        // $post = User::find($id)->posts;
        $post = User::find($id);
        $post->delete();
        // dd($post);
        // return $post->posts;
        return redirect('/login')->with('success', 'Account deleted successfully');;
    }
}

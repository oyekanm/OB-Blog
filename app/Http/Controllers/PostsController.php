<?php

namespace App\Http\Controllers;

use App\Models\Category;
use DB;
use Illuminate\Http\Request;

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Storage;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index', 'show']]);
    }

    public function index(Request $request)
    {
        if($request->category){
            $posts = Post::whereHas('category',function($query) use($request){
                $query->where('category_id', $request->category);
           })->latest()->paginate(20);
            // dd($posts);
            return view('Post.index',compact("posts"));
        }
        //fetch all post
       $post = Post::latest()->paginate(20);


        return view('Post.index')->with("posts",$post);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck("name","id")->all();
        // dd($categories);
        return view('Post.create')->with("categories",$categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
            'cover_image' => 'required|image|nullable|max:1999',
            'categories' => 'required'
        ]);
        // dd(implode("",$request->categories));
        // // Handle File Upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
           $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
		
	    // make thumbnails
	    // $thumbStore = 'thumb.'.$filename.'_'.time().'.'.$extension;
        //     $thumb = Image::make($request->file('cover_image')->getRealPath());
        //     $thumb->resize(80, 80);
        //     $thumb->save('storage/cover_images/'.$thumbStore);
		
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        // Create Post
        // dd($request->get('categories'));
        $post = new Post;

        // dd($request->title);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->slug = $this->slugify($request->input('title'));
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();
        $find = Post::find($post->id);
        $find->category()->attach($request->categories);
        // $find->category()->sync($request->categories);
        // dd($find);
        
        return redirect('posts')->with('success', 'post was created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post) 
    {
        //
        // dd($post->id);
        // dd(Post::findorFail($post));
        // $post = Post::find($id);
        // dd(Post::find($id));
    //    return $post;
    
        return view('Post.show')->with('post',$post);
    } 

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $post = Post::find($id);
        $categories = Category::pluck("name","id")->all();
        // dd($post);

        if (!isset($post)){
            return redirect('/posts')->with('error', 'No Post Found');
        }

        // Check for correct user
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }
        // dd($post);
        return view('Post.edit',compact("post","categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        
 
        $this->validate($request,[
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        $post = Post::find($id);

        // // Handle File Upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
           $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
            
            // Delete Previous Image
            Storage::delete('public/cover_images/'.$post->cover_image);


	    // make thumbnails
	    // $thumbStore = 'thumb.'.$filename.'_'.time().'.'.$extension;
        //     $thumb = Image::make($request->file('cover_image')->getRealPath());
        //     $thumb->resize(80, 80);
        //     $thumb->save('storage/cover_images/'.$thumbStore);
		
        }

        
       
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }
        $post->save();
        $find = Post::find($post->id);
        // $find->category()->attach($request->categories);
        $find->category()->sync($request->categories);
        // echo $post;


        return redirect('posts')->with('success', 'post was created edited');
  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);

        // dd(Route::current());

        if (!isset($post)){
            return redirect('/posts')->with('error', 'No Post Found');
        }

        // Check for correct user
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        if($post->cover_image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/cover_images/'.$post->cover_image);
        }
        
         Post::destroy($id);
         return redirect('posts')->with('success', 'post was deleted sucessfully');
    }
    public function slugify($string)
    {
        #credit to Carlos Delgado
        #original link https://ourcodeworld.com/articles/read/253/creating-url-slugs-properly-in-php-including-transliteration-support-for-utf-8
        return strtolower(trim(preg_replace('~[^0-9a-z]+~i', '-', html_entity_decode(preg_replace('~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', htmlentities($string, ENT_QUOTES, 'UTF-8')), ENT_QUOTES, 'UTF-8')), '-'));
    }
}


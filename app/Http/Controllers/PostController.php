<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function publicIndex(){
        $posts = Post::with('user','category')->latest()->paginate(6);
        return view('public.index', compact('posts'));
    }

    public function index(){
        $posts = Post::where('user_id', Auth::id())->with('category')->get();
        return view('posts.index', compact('posts'));
    }

    public function create(){
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create', compact('categories','tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'content'=>'required',
            'category_id'=>'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
        $data = $request->except('_token','tags');
        $data['user_id'] = Auth::id();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'), $name);
            $data['image'] = $name;
        }
        $post = Post::create($data);
        if($request->tags) $post->tags()->attach($request->tags);
        return redirect()->route('posts.index')->with('success','Post created.');
    }

    public function edit(Post $post){
        $this->authorize('update', $post);
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.edit', compact('post','categories','tags'));
    }

    public function update(Request $request, Post $post){
        $this->authorize('update', $post);
        $data = $request->except('_token','_method','tags');
        if($request->hasFile('image')){
            $file = $request->file('image');
            $name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'), $name);
            $data['image'] = $name;
        }
        $post->update($data);
        $post->tags()->sync($request->tags ?: []);
        return redirect()->route('posts.index')->with('success','Post updated.');
    }

    public function destroy(Post $post){
        $this->authorize('delete', $post);
        $post->delete();
        return redirect()->route('posts.index')->with('success','Post deleted.');
    }
}

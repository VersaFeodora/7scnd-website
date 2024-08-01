<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexAdmin(Request $request){
        $posts = DB::table('posts')
                ->select('*')
                ->orderBy('id', 'asc')->get();
        return view('admin.blogs', [
            'blogs' => $posts
        ]);
    }

    public function show($id)
    {
        $post = DB::table('posts')
            ->where('posts.slug', $id)
            ->first();
        $date = $post->created_at;
        $date = date("F j, Y, g:i a");
        return view('blogs.blogdetail', [
            'post'=>$post,
            'date' => $date
        ]);
    } 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.blogadd');
    }
    public function showEdit($id)
    {
        $post = DB::table('posts')
            ->where('posts.slug', $id)
            ->first();
        return view('blogs.blogedit', [
            'post'=>$post,
        ]);
    } 
    public function store(StorePostRequest $request){
        // Validate and retrieve the validated data
        $params = $request->validated();

        // Generate the slug from the title
        $slug = Str::slug($request->input('title'));

        // Add the slug to the params
        $params['slug'] = $slug;

        // Handle the image upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageName = time() . '.' . $request->image->extension();
            $uploadedImage = $request->file('image')->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName;
            $params['img_url'] = $imagePath;
        }

        // Create the post with the updated params
        if ($post = Post::create($params)) {
            return redirect(route('indexAdmin'))->with('success', 'Added!');
        }

        return redirect()->back()->with('error', 'Failed to create post.');
    }
    public function update(StorePostRequest $request, $id){
        // Validate and retrieve the validated data
        $params = $request->validated();
        $initialPost = DB::table('posts')
        ->select('*')
        ->where('slug', $id)
        ->first();

        // Generate the slug from the title
        $slug = Str::slug($request->input('title'));

        // Add the slug to the params
        $params['slug'] = $slug;

        // Handle the image upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageName = time() . '.' . $request->image->extension();
            $uploadedImage = $request->file('image')->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName;
            $params['img_url'] = $imagePath;
        }

        $params = Arr::except($params, ['image']);

        if(!empty($imagePath)) {
            Storage::delete($initialPost->img_url);
        }
        Post::where('slug',$id)->update($params);
        return redirect(route('indexAdmin'))->with('success', 'Updated!');
    }
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect(route('indexAdmin'))->with('success', 'Deleted!');
    }
}

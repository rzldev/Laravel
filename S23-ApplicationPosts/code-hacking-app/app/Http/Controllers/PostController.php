<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostCreateRequest;;
use App\Http\Requests\PostEditRequest;
use App\Model\Post;
use App\Model\Category;
use App\Model\Photo;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        $input = $request->all();

        $user = Auth::user();

        if ($file = $request->photo) {
            $fileName = time().$file->getClientOriginalName();
            $file->move('images', $fileName);
            $photo = Photo::create(['path'=>$fileName]);

            $input['photo_id'] = $photo->id;
        }

        $user->posts()->create($input);

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        $categories = Category::pluck('name', 'id')->all();

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostEditRequest $request, $id)
    {
        $post = Post::findOrFail($id);

        if ($post->photo != '') {
            unlink(public_path() . $post->photo->path);
            $photo = Photo::where('id', $post->photo->id)->delete();
        }

        $input = $request->all();

        if ($file = $request->photo) {
            $fileName = time().$file->getClientOriginalName();
            $file->move('images', $fileName);
            $photo = Photo::create(['path'=>$fileName]);

            $input['photo_id'] = $photo->id;
        }

        $post->update($input);

        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post = Post::findOrFail($id);

      unlink(public_path() . $post->photo->path);

      $photo = Photo::where('id', $post->photo->id)->delete();

      $post->delete();

      Session::flash('deleted_post', 'The post has been deleted');

      return redirect('/posts');
    }
}

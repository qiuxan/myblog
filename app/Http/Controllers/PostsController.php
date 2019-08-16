<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts=Post::all();

        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {

//        return 'store';
//
        $image = $request->image->store('posts');
        Post::create([
            'title' =>$request->title,
            'description'=> $request->description,
            'image'=>$image

        ]);
//
        session()->flash('success', 'Post Create Successfully');
//
        return redirect(route('posts.index'));



        //
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
    public function edit(Post $post)
    {
        return view('posts.create')->with('post',$post);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request,Post $post)
    {
        $data=$request->only(['title','description','published_at']);
        //
        if ($request->hasFile('image')){

            $image=$request->image->store('posts');

//            Storage::delete($post->image);
            $post->deleteImage();

            $data['image']= $image;
        }

        $post->update($data);

        session()->flash('success','Post updated successfully');

        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= Post::withTrashed()->where('id',$id)->firstOrFail();

        if ($post->trashed()){

//            Storage::delete($post->image);

            $post->deleteImage();

            $post->forceDelete();
        }
        else{
            $post->delete();
        }

        session()->flash('success', 'Post Deleted Successfully');
        //
        return redirect(route('posts.index'));
    }
    /**
     * Display a listing of the soft deleted posts.
     *
     * @return \Illuminate\Http\Response
     */


    public function trashed(){

        $trashed= Post::onlyTrashed()->get();


        return view('posts.index')->with('posts',$trashed);
    }

    public function restore($id){

//        return 'this is restore';
        $post= Post::withTrashed()->where('id',$id)->firstOrFail();
        $post->restore();

        session()->flash('success', 'Post Restore Successfully');

        return redirect()->back();

    }
}

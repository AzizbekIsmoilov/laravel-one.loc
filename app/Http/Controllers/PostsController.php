<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Rules\PhoneNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cachedPosts = Redis::get(Post::className());
        if(isset($cachedPosts)) {
            $posts = json_decode($cachedPosts, FALSE);
            return response()->json([
                'status_code' => 201,
                'message' => 'Fetched from redis',
                'data' => $posts,
            ]);
        }else {
//            $posts = Post::all();
            $posts = Post::orderByDesc('created_at')->paginate(20);
            Redis::set(Post::className(), json_encode($posts));
            return response()->json([
                'status_code' => 201,
                'message' => 'Fetched from database',
                'data' => $posts,
            ]);
        }
//        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
           'name' => 'required',
           'age' => 'numeric',
           'fullname' => 'string',
           'reg_date' => 'date',
           'phone' => ['required','numeric',new PhoneNumber()]
        ]);
        $post = Post::created($data);
//        $post = new Post();
//
//            $post['name'] = $data['name'];
//            $post['phone'] = $data['phone'];
//            $post['fullname'] = $data['fullname'];
//            $post['reg_date'] = $data['reg_date'];
//            $post['age'] = $data['age'];
//
//        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * @param Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Post $post)
    {
        return view('posts.show',['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $post = Post::
//        return view('posts.edit',['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

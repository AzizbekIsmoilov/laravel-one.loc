<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(){
//        $data_post = DB::table('post')->get()->toArray();
        $data_post = Post::all()->toArray();
        return view('post/index', ['data_post'=> $data_post]);
    }
}

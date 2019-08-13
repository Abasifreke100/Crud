<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskCreateRequest;
//use App\Http\Requests\TaskUpdateRequest;
use Illuminate\Support\Str;

class WelcomeController extends Controller
{
    public function index()
    {
        $posts = [];

        if(file_exists('posts.json')){

            $posts = json_decode(file_get_contents('posts.json'));
        }

        return view('welcome')->with('posts',$posts);
    }


    public function create(TaskCreateRequest $request)
    {
        $posts = [];

        if(file_exists('posts.json')){

            $posts = json_decode(file_get_contents('posts.json'));
        }

        $post = $request->all();
        $post['id'] = Str::random(32);

        array_push($posts,$post);

        $jsonPost = json_encode($posts);

        file_put_contents('posts.json',$jsonPost);

        return redirect()->back()->with('status','Task Successfully Assign !!');
    }


    public function edit($id)
    {
        return view('edit')->with('posts',$id);
    }









}

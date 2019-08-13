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

            $posts = (array) json_decode(file_get_contents('posts.json'));
        }

        $id = Str::random(32);

        $posts[$id] = array_merge(['id' => $id],$request->except('_token'));

        $jsonPosts = json_encode($posts);

        file_put_contents('posts.json',$jsonPosts);

        return redirect()->back()->with('status','Task Successfully Assign !!');
    }


    public function edit($id)
    {
        return view('edit')->with('posts',$id);
    }

    public function update($id)
    {
        $posts = [];

        if(file_exists('posts.json')){
            $posts = (array) json_decode(file_get_contents('posts.json'));
        }

        $posts[$id] = array_merge((array)$posts[$id], request()->except('_token'));

        $jsonPosts = json_encode($posts);

        file_put_contents('posts.json',$jsonPosts);

        return redirect()->back()->with('status','Task Successfully Updated !!');

    }

    public function delete($id)
    {
        $posts = [];

        if(file_exists('posts.json')){
            $posts = (array) json_decode(file_get_contents('posts.json'));
        }

        unset($posts[$id]);

        $jsonPosts = json_encode($posts);

        file_put_contents('posts.json',$jsonPosts);

        return redirect()->back()->with('status','Task Successfully Deleted !!');

    }









}

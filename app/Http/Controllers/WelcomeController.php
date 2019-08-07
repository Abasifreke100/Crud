<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome')->with('posts',Post::all());
    }

    public function create(Request $request)
    {

        $request->validate([
            'assignee'=>'required',
            'task'=>'required',
            'description'=>'required'
        ]);

        $post = new Post;

        $post->assignee = $request->assignee;
        $post->task = $request->task;
        $post->description = $request->description;
        $post->save();

        return redirect()->back()->with('status','Task Successfully Assign !!');
    }

    public function edit($id)
    {
        $post = Post::where('id',$id)->first();

        return view('edit',compact('post'));
    }

    public function update(Request $request,$id)
    {
        $post = Post::where('id',$id)->first();
        $post->assignee = $request->input('assignee');
        $post->task = $request->input('task');
        $post->description = $request->input('description');
        $post->save();
        return back()->with('status','Task Successfully Updated !!');
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return back()->with('status','Task Successfully Remove !!');
    }






}

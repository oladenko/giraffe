<?php


namespace App\Http\Controllers\post;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController
{
    public function create()
    {
        $users = User::all();
        return view('post.form', compact('users'));
    }

    public function store(Request $request)
    {
      $data =   $request->validate([
            'title'       => ['required', 'unique:posts,title'],
            'description' => ['required', 'min:10'],
            'user_id'     => ['required', 'exists:users,id'],

        ]);
        Post::create($data);
        return redirect()->route('home');

    }

    public function edit(Post $post)
    {
        $users = User::all();
        return view('post.form', compact('users', 'post'));
    }


    public function update(Post $post, Request $request)
    {
        $data = $request->validate([
            'title'       => ['required', ],// 'unique:posts,title'
            'description' => ['required', 'min:10'],
            'user_id'     => ['required', 'exists:users,id'],

        ]);
        $post->update($data);

        return redirect()->route('home');

    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect()->route('home');
    }
}

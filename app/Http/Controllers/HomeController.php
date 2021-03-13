<?php


namespace App\Http\Controllers;


use App\Models\Post;

class HomeController
{
//public function index()
//{
//    return view('layout');
//}
public function __invoke()
{
    $posts = Post::paginate(5);
    return view('pages.posts', compact('posts'));
}
}

<?php


namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController
{
public function create()
{
    $users = User::all();

    return view('pages.login', compact('users' ));
}
public function store(Request $request)
{


    $data = $request->validate([
        'email' => ['required', 'email'],
        'password'=>['required', 'min:8'],
        'name'=>['required']

    ]);
    User::create($data);


   // dd("!!!");
    //dd($data['email']);
    //dd(User::where('email', $data['email'])->get()->first());
    return redirect()->route('home');
//    if (Auth::attempt($data)) {
//
//        $user = Auth::user();
//        $user->password = Hash::make($data['password']);
//        $user->save();
//        return redirect()->route('home');
//    }
//    return back()->withErrors([
//        'email' => 'Email or password in incorrect.'
//    ]);

}
}

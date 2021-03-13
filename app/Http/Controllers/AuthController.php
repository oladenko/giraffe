<?php


namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Nullable;

class AuthController
{
    public function login()
    {
        return view('pages.login');
    }

    public function handleLogin(Request $request)
    {
        $data = $request->validate([
            'name'     => ['required'],
//            'email'    => [ 'email'],
            'password' => ['required', 'min:8'],
        ]);

        $user = User::where('name', $data['name'])->first();

        //   dd($user->toSql());
        if ($user == null) {
         //   $data = $request->validate(['name'=>['unique:users,name']]);
            $data['password'] = Hash::make($data['password']);
            $user = User::create($data);

            Auth::login($user);

            return redirect()->route('home');
        } else {
            if (Auth::attempt($data)) {

                return redirect()->route('home');
            } else {
                return back()->withErrors([
                    'email' => 'Email or password is incorrect.'
                ]);
            }
        }
    }



// Шаг 1. Проверить существует ли пользователь в БД
// ::where('email', $data['email'])->first()
//
// Шаг 2. Если юзера нет, то тут же хешируем его пароль и сохраняем бд. Аутентифицируем через Auth::login
//
// Шаг 3. Если юзер с мэйлом в бд есть, то проверяем его через Auth::attempt


//        if (Auth::attempt($data)) {

//        $user = Auth::user();
//        $user->password = Hash::make($data['password']);
//        $user->save();
//        return redirect()->route('home');
//    }
//        return back()->withErrors([
//            'email' => 'Email or password in incorrect.'
//        ]);

// return redirect()->route('home');
//    }

    public
    function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}

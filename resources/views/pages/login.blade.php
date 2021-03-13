
@extends('layout')
@section('content')

    <form action="" method="post">
        @csrf
{{--        @if($errors->has('email'))--}}
{{--            @foreach($errors->get('email') as $error)--}}
{{--                <div class="alert alert-danger" role="alert">--}}
{{--                    {{$error}}--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        @endif--}}
{{----}}
{{--        <div class="container center_div">--}}
{{--            <label for="email"  class="form-label">Email:</label>--}}
{{--            <input type="email" name="email" id="email"  class="form-control">--}}
{{--        </div>--}}
{{----}}
{{--        <br>--}}
        @if($errors->has('name'))
            @foreach($errors->get('name') as $error)
                <div class="alert alert-danger" role="alert">
                    {{$error}}
                </div>
            @endforeach
        @endif

        <div class="container center_div">
            <label for="name"  class="form-label">Username:</label>
            <input type="text" name="name" id="name"  class="form-control">
        </div>

        <br>
        @if($errors->has('password'))
            @foreach($errors->get('password') as $error)
                <div class="alert alert-danger" role="alert">
                    {{$error}}
                </div>
            @endforeach
        @endif
        <div class="container center_div">
            <label for="password"  class="form-label">Password:</label>
            <input type="password" name="password" id="password"  class="form-control">
        </div>
        <br>
        <div class="container center_div">
            <input type="submit" value="Log in"  class="btn btn-primary">
        </div>
        <br>
{{--        <div class="container center_div">--}}
{{--            <input type="submit" value="Create account"  class="btn btn-primary">--}}
{{--        </div>--}}
{{--        <div class="container center_div">--}}
{{--            <br>--}}
{{--        <a href="{{route('user-create')}}" class="btn btn-primary">Create account</a>--}}
{{--        </div>--}}
    </form>
@endsection

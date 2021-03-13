@extends('layout')

@section('content')
   <a href="{{route('auth.logout')}}">Log out</a>
   @auth
    <a href="{{route('post-management.create')}}">Create Ad</a>
   @endauth
    @foreach($posts as $post)
        @include('partials.post', ['post'=>$post])
    @endforeach



@endsection

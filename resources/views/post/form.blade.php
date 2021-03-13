@extends('layout')
@section('content')
    <form action="" method="post">
        @csrf
        @if($errors->has('title'))
            @foreach($errors->get('title') as $error)
                <div class="alert alert-danger" role="alert">
                    <p>{{$error}}</p>
                </div>
            @endforeach
        @endif
        <div class="container center_div">
            <label for="title" class="form-label">Title</label>
            <input    class="form-control " list="datalistOptions" type="text" name="title" value="{{old('title', $post->title ?? null)}}"
                      placeholder="Write your title" id="title"/>
        </div>
        <br>
        @if($errors->has('user_id'))
            @foreach($errors->get('user_id') as $error)
                <div class="alert alert-danger" role="alert">
                    <p>{{$error}}</p>
                </div>
            @endforeach
        @endif
        <div class="container center_div">
            <label for="user_id" class="form-label">Author Name</label>
            <select name="user_id" id="" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                @foreach($users as $user)

                    <option @if($user->id == old('user_id',  $post->user_id ?? null)) selected @endif value="{{$user->id}}"> {{$user->name}}</option>
                @endforeach
            </select>
        </div>
        <br>

        @if($errors->has('description'))
            @foreach($errors->get('description') as $error)
                <div class="alert alert-danger"  role="alert" >
                    <p>{{$error}}</p>
                </div>
            @endforeach
        @endif
        <div class="container center_div">
            <label for="description" class="form-label" >Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{old('description', $post->description ?? null)}}</textarea>
        </div>
        <br>
        <div class="container center_div">
            <button type="submit" class="btn btn-info">Create</button>
        </div>





    </form>
@endsection

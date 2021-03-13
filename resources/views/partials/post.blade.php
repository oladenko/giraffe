
<h1>{{$post->title}}</h1>
<p>{{$post->user->name}}</p>
<p>{{$post->created_at->diffforhumans()}}</p>
<p>{{$post->description}}</p>
@auth
<a href="{{route('post-management.edit', $post->user->id)}}">Edit</a>
@endauth
@auth
<a href="{{route('post-management.delete', $post->user->id)}}">Delete</a>
@endauth



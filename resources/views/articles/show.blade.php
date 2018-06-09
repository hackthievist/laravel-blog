@extends('app')
@section('content')

<h1>{{ $article->title }}</h1>

<hr>

<div class="body">
    <p>{{ $article->description }}</p>
    <img src="{{asset('images') . "/" . $article->cover_image}}">
</div>

<div>
    <a href="{{url('articles', $article->id)}}/edit"><button class="btn btn-primary">Update</button></a>
</div>

<div>
    <hr>
    {!! Form::open([
        'method' => 'DELETE',
        'action' => ['ArticlesController@destroy', $article->id]
    ]) !!}
    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
</div>
    {!! Form::close() !!}

@endsection
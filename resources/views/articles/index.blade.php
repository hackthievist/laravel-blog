@extends('app')

@section('content')

<h1>{{ "All Articles" }}</h1>

<p>Articles by <b>{{ $username }}</b></p>

<hr>

<article>

@foreach($articles as $article)
    <a href="{{ url('articles', $article->id) }}"><h2>{{ $article->title }}</h2></a>
    <div class="body">
        <p>{{ $article->description }}</p>
        <p><i>{{ Carbon\Carbon::parse($article->published_at) ->diffForHumans() }}</i></p>
    </div>
@endforeach

@endsection
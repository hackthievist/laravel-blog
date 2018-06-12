@extends('app')

@section('content')

<h1>{{ "All Articles" }}</h1>

<p>Articles by <b>{{ $username }}</b></p>

<hr>

@if(count($articles) > 0)
<article>

@foreach($articles as $article)
    <a href="{{ url('articles', $article->id) }}"><h2>{{ $article->title }}</h2></a>
    <div class="body">
        <p>{{ $article->description }}</p>
        <p><i>{{ Carbon\Carbon::parse($article->published_at) ->diffForHumans() }}</i></p>
    </div>
@endforeach

</article>

@else

<div class="body">
    <center><i><h2>No Articles Yet</h2></i></center>
</div>

@endif

@endsection

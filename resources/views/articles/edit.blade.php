@extends('app')

@section('content')

<h1>Edit: {{ $article->title }}</h1>

<hr>

{!! Form::model($article, ['action' => ['ArticlesController@update', $article->id], 'method' => 'patch']) !!}

@include('articles.form', ['submitButtonText' => 'Update Article'])

@include('list.errors')

@endsection
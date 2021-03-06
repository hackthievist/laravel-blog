@extends('app')

@section('content')

<h1>Write a New Article</h1>
<hr>
{!! Form::open(['url' => 'articles', 'files' => 'true', 'enctype' => 'multipart/form-data']) !!}
    @include('articles.form', ['submitButtonText' => 'Add New Article'])
{!! Form::close() !!}

@include('list.errors');
@endsection
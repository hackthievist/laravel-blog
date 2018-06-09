{!! Form::hidden('user_id', $user_id) !!}

<div class="form-group">
    {!! Form::label('title', 'Title') !!};
    {!! Form::text('title', null, ['class' => "form-control"]) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('published_at', 'Published On') !!}
    {!! Form::date('published_at', Carbon\Carbon::now(), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('cover_image', 'Image', ['class' => 'control-label']) !!}
    {!! Form::file('cover_image') !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
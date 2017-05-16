<!doctype html>
<html lang="en">
@include('layouts.head')
<body>
    {!!  Form::open(['url' => action('AdsController@store', ['id' => $ads->id])]) !!}
        {!! Form::label('title', 'Title') !!}
        <br>
        {!! Form::text('title', $ads->title) !!}
        <br>
        {!! Form::label('description', 'Your advertisement here') !!}
        <br>
        {!! Form::textarea('description', $ads->description) !!}
        <br>
        {!! $ads->id ? Form::submit('Save', ['class' => 'btn btn-success']) : Form::submit('Create', ['class' => 'btn btn-success']) !!}
    {!!  Form::close() !!}



</body>
</html>
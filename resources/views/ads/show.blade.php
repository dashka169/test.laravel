<!doctype html>
<html lang="en">
@include('layouts.head')
<body>
    <table class="table table-stripped">
        <tbody>
            <tr>
                <td>ID</td>
                <td>{{ $ad->id }}</td>
            </tr>
            <tr>
                <td>Author</td>
                <td>{{ $ad->user->name }}</td>
            </tr>
            <tr>
                <td>Title</td>
                <td>{{ $ad->title }}</td>
            </tr>
            <tr>
                <td>Description</td>
                <td>{{ $ad->description }}</td>
            </tr>
            <tr>
                <td>Created at</td>
                <td>{{ $ad->created_at }}</td>
            </tr>
            <tr>
                <td>Upadated at</td>
                <td>{{ $ad->updated_at }}</td>
            </tr>
        </tbody>
    </table>
    @if ($user && $user->can('update', $ad))
        <a class="btn btn-success" href="{{ action('AdsController@edit', ['id' => $ad->id]) }}">Edit</a>
    @endif
    @if ($user && $user->can('delete', $ad))
        {!! Form::open(['url' => action('AdsController@destroy', ['id' => $ad->id]), 'method' => 'delete']) !!}
        <button class="btn btn-danger" type="submit">Delete</button>
        {!! Form::close() !!}
    @endif


</body>
</html>
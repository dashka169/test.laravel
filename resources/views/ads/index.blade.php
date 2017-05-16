<!doctype html>
<html lang="en">
@include('layouts.head')
<body>
    @if($user)
        <a class="btn btn-success" href="{{ action('AdsController@create') }}">Create Ad</a>
    @endif
    <table class="table table-stripped">
        <thead>
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Title
                </th>
                <th>
                    Description
                </th>
                <th>
                    Author
                </th>
                <th>

                </th>
            </tr>
        </thead>
        <tbody>
        @foreach ($ads as $ad)
            <tr>
                <td class="id">
                    {{ $ad->id }}
                </td>
                <td class="title1">
                    <a href="{{ action('AdsController@show', ['id' => $ad->id]) }}">{{ $ad->title }}</a>
                </td>
                <td class="description">
                    {{ $ad->description }}
                </td>
                <td class="author">
                    {{  $ad->user->name }}
                </td>
                <td class="actions">
                    @if ($user && $user->can('update', $ad))
                        <a class="btn btn-success" href="{{ action('AdsController@edit', ['id' => $ad->id]) }}">Edit</a>
                    @endif
                    @if ($user && $user->can('delete', $ad))
                        {!! Form::open(['url' => action('AdsController@destroy', ['id' => $ad->id]), 'method' => 'delete']) !!}
                            <button class="btn btn-danger" type="submit">Delete</button>
                        {!! Form::close() !!}
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $ads->links() }}
    </body>
</html>
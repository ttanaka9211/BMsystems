@extends('layouts.app')
@section('content')
    <h1>Post</h1>

<h2>All</h2>

<table>
    <tr>
        <th>id</th>
        <th>user_id</th>
        <th>date</th>
    </tr>
    @foreach ($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->user_id }}</td>
            <td>{{ $post->date }}</td>
        </tr>
    @endforeach
</table>

<h2>Create new post</h2>

@if ($errors->any())
    <div>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

<form action="/posts" method="POST">
    {{ csrf_field() }}
    <div>
        <label>user_id</label><br>
        <input type="text" name="user_id" />
    </div>
    <div>
        <label>date</label><br>
        <input type="date" name="date" id="">
    </div>
    <div>
        <input type="submit" value="Create" />
    </div>
</form>
@endsection

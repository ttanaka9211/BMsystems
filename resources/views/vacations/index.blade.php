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
    @foreach ($vacations as $vacation)
        <tr>
            <td>{{ $vacation->id }}</td>
            <td>{{ $vacation->use_id }}</td>
            <td>{{ $vacation->date }}</td>
            <td>{{ $vacation->reason }}</td>
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

<form action="/vacations" method="POST">
    {{ csrf_field() }}
    <div>
        <label>user_id</label><br>
        <input type="text" name="user_id" />
    </div>
    <div>
        <label>name</label><br>
        <input type="text" name="user_id" />
    </div>
    <div>
        <label>date</label><br>
        <input type="date" name="date" id="">
    </div>
    <div>
        <label>理由</label><br>
        <textarea name="reason"></textarea>
    </div>
    <div>
        <input type="submit" value="Create" />
    </div>
</form>
@endsection

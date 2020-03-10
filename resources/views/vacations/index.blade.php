@extends('layouts.app')

@section('content')
    <h1>休日申請</h1>

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
        <input type="text" name="user_id" id="" value="{{Auth::id()}}">
    </div>
    <div>
        <label>name</label><br>
        <input type="text" name="name" id="" value="{{ Auth::user()->name }}">
    </div>
    <div>
        <label>email</label><br>
        <input type="text" name="email" id="" value="{{ Auth::user()->email }}">
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

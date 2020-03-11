@extends('layouts.app')

@section('content')
    <h1>休日申請</h1>
<table>
    <tr>
        <th>名前</th>
        <th>日付</th>
        <th>承認状態</th>
    </tr>
    @foreach ($vacations as $vacation)
        <tr>
            <td>{{ $vacation->name }}</td>
            <td>{{ $vacation->date }}</td>
            <td>{{ if(($vacation->accepted)<1) {
                承認できません。
            }　else{
                承認しました。
            } }}</td>
        </tr>
    @endforeach
</table>
@if ($errors->any())
    <div>
        <ul>
        @foreach ($errors->all() as $error)
            <li style="color:red;">{{ $error }}</li>
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

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('layouts.menu')
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header">休日申請</div>
                <div class="card-body d-flex align-items-center">
                    <div class="card-title d-flex align-items-center">
<table>
    <tr>
        <th>名前</th>
        <th>日付</th>
        <th>承認状態</th>
    </tr>
    </div>
    @foreach ($vacations as $vacation)
        <tr>
            <td>{{ $vacation->name }}</td>
            <td>{{ $vacation->date }}</td>
            <td> @if(($vacation->accepted)<1)
                    承認できません
            @else
                承認しました。
            @endif
            </td>
        </tr>
    @endforeach
</table>
                </div>
                <div class="card-body d-flex align-items-center">
@if ($errors->any())
    <div>
        <ul>
        @foreach ($errors->all() as $error)
            <li style="color:red;">{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
                </div>
<div class="card-body d-flex align-items-center">

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
</div>
@endsection

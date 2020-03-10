@extends('layouts.app');
@section('content')
<table>
    <tr>
        <th>名前</th>
        <th>メアド</th>
        <th>時給</th>
        <th>編集</th>
    </tr>
    @foreach ($items as $item)
    <tr>
        <td>{{$item->name}}</td>
        <td>{{$item->email}}</td>
        <td>{{$item->hourly_wage}}</td>
        <td><a href={{ route('users.edit', ['user' => $item->id]) }}>編集</a></td>
    </tr>
    @endforeach
</table>
@endsection

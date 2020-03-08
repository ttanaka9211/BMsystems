@extends('layouts.app');
@section('content')
<table>
    <tr>
        <th>name</th>
        <th>mail</th>
        <th>zipcode</th>
    </tr>
    @foreach ($items as $item)
    <tr>
        <td>{{$item->name}}</td>
        <td>{{$item->email}}</td>
        <td>{{$item->zipcode}}</td>
    </tr>
    @endforeach
</table>
@endsection

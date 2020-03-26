@extends('layouts.app');
@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('layouts.menu')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">時給変更</div>
                <div class="card-body">
                <table>
                    <tr>
                    <th>名前</th>
                    <th>メアド</th>
                    <th>時給</th>
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
                </div>
@endsection

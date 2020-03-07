@extends('layouts.app')

@section('content')
<nav>
<ul>
    @can('system-only') {{-- システム管理者権限のみに表示される --}}
    <li><a href="">機能１</a></li>
    @elsecan('admin-higher')　{{-- 管理者権限以上に表示される --}}
    <li><a href="">機能２</a></li>
    <li><a href="">機能３</a></li>
    @elsecan('user-higher') {{-- 一般権限以上に表示される --}}
    <li><a href="">機能４</a></li>
    <li><a href="">機能４</a></li>
    <li><a href="">機能４</a></li>
    <li><a href="">機能５</a></li>
    @endcan
</ul>
</nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">シフト表</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

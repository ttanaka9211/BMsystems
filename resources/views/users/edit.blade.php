@extends('layouts.app')
@section('content')
<div class="container">
     <div class="row justify-content-center">
        @include('layouts.menu')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">時給変更</div>
                <div class="card-body">
    <form action="{{ url('users/'.$user->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>
        </div>
        <div class="form-group">
            <label for="email">{{ __('email') }}</label>
            <input id="email" type="text" class="form-control" name="email" value="{{ $user->email }}" required autofocus>
        </div>
        <div class="form-group">
            <label for="hourly_wage">{{ __('hourly_wage') }}</label>
            <input type="text" class="form-control" name="hourly_wage" value="{{ $user->hourly_wage }}" required autofocus>
        </div>
        <div class="form-group">
            <label for="hiredate">{{ __('hire_date') }}</label>
            <input type="date" class="form-control" name="hire_date" value="<?php echo date('Y-m-d');?>" required autofocus>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        <input type="hidden" name="id">
    </form>
                </div>
</div>
@endsection

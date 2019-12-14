@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <a class="btn btn-success btn-lg mb-4 text-white" href="{{URL::route('user_add')}}">Добавить пользователя</a>
    </div>
</div>
@endsection
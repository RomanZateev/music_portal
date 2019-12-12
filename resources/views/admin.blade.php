@extends('layouts.app')

@section('content')
<div class="container">

    <a class="btn btn-primary" href="{{ URL::route('user_add') }}" role="button">Добавить пользователя</a>

    <a class="btn btn-primary" href="{{ URL::route('artist_add') }}" role="button">Добавить исполнителя</a>

    <a class="btn btn-primary" href="{{ URL::route('song_add') }}" role="button">Добавить композицию</a>

</div>
@endsection

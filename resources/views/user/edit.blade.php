
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <form method="POST" action="{{route('user_update')}}" class="width">
            <div class="form-group">
                <label for="" class="about-form">Имя</label>
                <input autocomplete="off" type="text" name="name" class='form-control width' value="{!! $user->name !!}">

                <label for="" class="about-form">e-mail</label>
                <input autocomplete="off" type="text" name="email" class='form-control width' value="{!! $user->email !!}">

                <label for="" class="about-form">Тип</label>
                <select name="type" class="form-control width">
                    <option value="default">default</option>
                    <option value="admin">admin</option>
                </select>

                <input type="hidden" name="id" value="{!! $user->id !!}">
            </div>
            <button class="btn btn-success" type="submit">Сохранить</button>
            {{ csrf_field() }}            
        </form>
    </div>
</div>

@endsection
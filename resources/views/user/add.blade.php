
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <form method="POST" action="{{route('user_store')}}">
            <div class="bootstrap-iso form-group">
                <label for="" class="about-form">Имя</label>
                <input autocomplete="off" type="text" name="name" class='form-control' placeholder="Имя">

                <label for="" class="about-form">Тип</label>
                <select name="type" class="form-control">
                    <option value="default">default</option>
                    <option value="admin">admin</option>
                </select>

                <label for="" class="about-form">e-mail</label>
                <input autocomplete="off" type="text" name="email" class='form-control' placeholder="e-mail">

                <label for="" class="about-form">Пароль</label>
                <input autocomplete="off" type="text" name="password" class='form-control' placeholder="пароль">
            </div>
            <button class="btn btn-success" type="submit">Добавить</button>
            {{ csrf_field() }}            
        </form>
    </div>
</div>

@endsection
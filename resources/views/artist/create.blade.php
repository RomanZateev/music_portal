
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <form method="POST" action="{{route('artist_store')}}" enctype="multipart/form-data">
            <div class="bootstrap-iso form-group">
                <label for="" class="about-form">Псевдоним</label>
                <input autocomplete="off" type="text" name="name" class='form-control' placeholder="Псевдоним">

                <label for="" class="about-form">Биография</label>
                <textarea autocomplete="off" class='form-control' cols="30" rows="10" name="biograpy"></textarea>

                <label for="" class="about-form">Изображение ссылка</label>
                <input autocomplete="off" type="url" name="image" class='form-control' placeholder="Ссылка">

                <label for="" class="about-form">Изображение</label>
                <input type="file" class="form-control" name="file"/>

            </div>
            <button class="btn btn-success" type="submit">Добавить</button>
            {{ csrf_field() }}            
        </form>
    </div>
</div>

@endsection
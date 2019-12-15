
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <form method="POST" action="{{route('artist_store')}}">
            <div class="bootstrap-iso form-group">
                <label for="" class="about-form">Псевдоним</label>
                <input autocomplete="off" type="text" name="name" class='form-control' placeholder="Псевдоним">

                <label for="" class="about-form">Псевдоним URL</label>
                <input autocomplete="off" type="text" name="nameURL" class='form-control' placeholder="Псевдоним URL">

                <label for="" class="about-form">Биография</label>
                <textarea autocomplete="off" class='form-control' cols="30" rows="10" name="biograpy"></textarea>

                <label for="" class="about-form">Изображение ссылка</label>
                <input autocomplete="off" type="url" name="image" class='form-control' placeholder="Ссылка">

                <label for="" class="about-form">Изображение</label>
                <input type="file" name="imageServer" class='form-control-file'>

                <label for="" class="about-form">Композиции</label>
                <select name="song_id" class="form-control">
                    @foreach ($songs as $song)
                        <option value="{{$song->id}}">{{$song->name}}</option>
                    @endforeach
                </select>

            </div>
            <button class="btn btn-success" type="submit">Добавить</button>
            {{ csrf_field() }}            
        </form>
    </div>
</div>

@endsection
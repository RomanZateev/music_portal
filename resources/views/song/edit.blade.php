
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <form method="POST" action="{{route('song_update')}}" enctype="multipart/form-data">
            <div class="bootstrap-iso form-group">
                <label for="" class="about-form">Название</label>
                <input autocomplete="off" type="text" name="name" class='form-control' placeholder="Название" value="{!! $song->name !!}">

                <label for="" class="about-form">Текст</label>
                <textarea autocomplete="off" class='form-control' cols="30" rows="10" name="text">
                    {!! $song->text!!}
                </textarea>

                <label for="" class="about-form">Ссылка на изображение</label>
                <input autocomplete="off" type="url" name="image" class='form-control' placeholder="Ссылка" value="{!! $song->image !!}">

                <label for="" class="about-form">Пояснение к композиции</label>
                <textarea autocomplete="off" class='form-control' cols="30" rows="10" name="notes">
                    {!! $song->notes!!}
                </textarea>

                <label for="" class="about-form">Автор текста</label>
                <input autocomplete="off" type="text" name="textAuthor" class='form-control' placeholder="Автор текста" value="{!! $song->textAuthor !!}">

                <label for="" class="about-form">Автор музыки</label>
                <input autocomplete="off" type="text" name="musicAuthor" class='form-control' placeholder="Автор музыки" value="{!! $song->musicAuthor !!}">

                <label for="" class="about-form">Альбом</label>
                <input autocomplete="off" type="text" name="album" class='form-control' placeholder="Альбом" value="{!! $song->album !!}">

                <input type="hidden" name="id" value="{!! $song->id !!}">
            </div>
            <button class="btn btn-success" type="submit">Обновить</button>
            {{ csrf_field() }}            
        </form>
    </div>
</div>

@endsection
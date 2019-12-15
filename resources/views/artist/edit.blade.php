
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <form method="POST" action="{{route('artists_update')}}" enctype="multipart/form-data">
            <div class="bootstrap-iso form-group">
                <label for="" class="about-form">Псевдоним</label>
                <input autocomplete="off" type="text" name="name" class='form-control' placeholder="Псевдоним" value="{!! $artist->name !!}">

                <label for="" class="about-form">Биография</label>
                <textarea autocomplete="off" class='form-control' cols="30" rows="10" name="biograpy">
                    {!! $artist->biograpy!!}
                </textarea>

                <label for="" class="about-form">Cсылка на изображение</label>
                <input autocomplete="off" type="url" name="image" class='form-control' placeholder="Ссылка" value="{!! $artist->image !!}">

                <label for="" class="about-form">Изображение</label>
                <input type="file" name="file" class='form-control-file'>

                <input type="hidden" name="id" value="{!! $artist->id !!}">
            </div>
            <button class="btn btn-success" type="submit">Обновить</button>
            {{ csrf_field() }}            
        </form>
    </div>
</div>

@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm">
            <form action="/search" method="POST" accept-charset="UTF-8">
                {{ csrf_field() }}
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="q" placeholder="Введите трек или исполнителя">

                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">
                            <span class="fa fa-search"></span>
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div> 
    @if ($song)
    
        <div class="row">
            <div class="col-4">
                <img src="/storage/app/img/songs/{{$song->nameURL}}.jpg" alt="" width="300" height="300">
            </div>
            <div class="col-8">
                <div class="h2 font-weight-bold">{{$song->name}}</div>
                @if ($song->album)
                    <div class="h4 font-weight-bold">Альбом: {{$song->album}}</div>
                @endif
                @if ($song->textAuthor)
                    <div class="h4 font-weight-bold">Автор текста: {{$song->textAuthor}}</div>
                @endif
                @if ($song->musicAuthor)
                    <div class="h4 font-weight-bold">Автор музыки: {{$song->musicAuthor}}</div>
                @endif
                <a href="" id="heart">
                    <img class="image_on" src="/storage/app/img/actions/heart.png" alt="heart">
                    <img class="image_off" src="/storage/app/img/actions/heart-active.png" alt="heart-active">
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="h4 font-weight-light text-secondary">{{$song->text}}</div>
            </div>
        </div>
    @endif
</div>
@endsection
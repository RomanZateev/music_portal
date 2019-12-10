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
    <!-- Как передавать артистов? ругается что не коллекция -->
    @if ($song)
        <div class="row bg-white">
            <div class="col-4">
                <img src="/storage/app/img/songs/{{$song->nameURL}}.jpg" class="img-front" alt="{{$song->name}}">
            </div>
            <div class="col-8">
                <div class="h2 font-weight-bold">{{$song->name}}</div>
                <div class="h4 font-weight-bold">
                    Исполнители:
                    @foreach ($artists as $artist)
                        <a class="" href="{{ URL::route('artist', $artist->artist->nameURL) }}">{{$artist->artist->name}}</a> 
                    @endforeach
                </div>
                @if ($song->album)
                    <div class="h4 font-weight-bold">Альбом: {{$song->album}}</div>
                @endif
                @if ($song->textAuthor)
                    <div class="h4 font-weight-bold">Автор текста: {{$song->textAuthor}}</div>
                @endif
                @if ($song->musicAuthor)
                    <div class="h4 font-weight-bold">Автор музыки: {{$song->musicAuthor}}</div>
                @endif
                <a href="" class="heart" id="{{$song->nameURL}}">
                    <img class="image_on" src="/storage/app/img/actions/heart.png" alt="heart">
                    <img class="image_off" src="/storage/app/img/actions/heart-active.png" alt="heart-active">
                </a>
            </div>
        </div>
        <div class="row bg-white top-buffer">
            <div class="col">
                <div class="h4 font-weight-light text-secondary">{!! nl2br(e($song->text)) !!}</div>
            </div>
        </div>
        <div class="row bg-white top-buffer">
            @if ($song->notes)
                <div class="col">
                    <div class="h5 font-weight-light">{!! nl2br(e($song->notes)) !!}</div>
                </div>
            @endif
        </div>
        @if ($song->video)
            <div class="row top-buffer bg-white">
                <div class="col">
                    <iframe width="560" height="315" src="{{$song->video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>            
        @endif
        <div class="row top-buffer">
            <div class="col">

            </div>
        </div>
    @endif
</div>
@endsection

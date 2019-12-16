@extends('layouts.app')

@section('content')
<div class="container">
    @if ($song)
        <div class="row bg-white rounded">
            <div class="col-md-auto m-2">
                <img src="{{$song->image}}" class="rounded img-front image zoom" width="300" height="300" alt="{{$song->name}}">
            </div>
            <div class="col col-auto m-2">
                <div class="h2 font-weight-bold">{{$song->name}}</div>
                <div class="h4 font-weight-bold">
                    Исполнители:
                    @foreach ($song->artists as $artist){{ $loop->first ? '' : ', ' }}
                        <a class="" href="{{ URL::route('artist', $artist->id)}}">{{$artist->name}}</a> 
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
                <!--
                <a href="" class="heart" id="{{$song->id}}">
                    <img class="image_on" src="/storage/app/img/actions/heart.png" alt="heart">
                    <img class="image_off" src="/storage/app/img/actions/heart-active.png" alt="heart-active">
                </a>-->
            </div>
        </div>
        <div class="row bg-white mt-4 pt-4 rounded">
            <div class="col">
                <div class="h3">
                    {!! nl2br(e($song->text)) !!}
                </div>
            </div>
        </div>
        <div class="row bg-white mt-4 rounded">
            @if ($song->notes)
                <div class="col">
                    <div class="row">
                        <div class="col h4 font-weight-light">О треке</div>
                    </div>
                    <div class="row">
                        <div class="col h4 font-weight-light text-justify">{!! nl2br(e($song->notes)) !!}</div>
                    </div>
                </div>
            @endif
        </div>
        @if ($song->video)
            <div class="row bg-white mt-4">
                <div class="col">
                    <div class="row">
                        <div class="col h4 font-weight-light">Клип:</div>
                    </div>
                    <div class="row m-1">
                        <iframe width="560" height="315" src="{{$song->video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>  
                </div>
            </div>
        @endif
    @endif
</div>
@endsection

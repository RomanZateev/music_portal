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
    @if ($artist)
        <div class="row bg-white">
            <div class="col-4">
                <img src="/storage/app/img/artists/{{$artist->nameURL}}.jpg" class="img-front" alt="{{$artist->name}}" class="img-front">
            </div>
            <div class="col-8">
                <div class="h2 font-weight-bold">{{$artist->name}}</div>
            </div>
        </div>
        @if ($artist->biograpy)
            <div class="h4 font-weight-light top-buffer bg-white">{!!nl2br(e($artist->biograpy))!!}</div>
        @endif
        <div class="row top-buffer">
            <div class="col h3 font-weight-light">
                Композиции исполнителя
            </div>
        </div>
        <div class="row bg-white">
            <div class="col">
                @foreach ($songs as $song)
                    <a class="h4 font-weight-light text-secondary" href="{{ URL::route('song', $song->song->nameURL) }}">
                        <img src="/storage/app/img/songs/{{$song->song->nameURL}}.jpg" class="img-front" alt="{{$song->name}}" width="50" height="50">
                        {{$song->song->name}}
                    </a>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection

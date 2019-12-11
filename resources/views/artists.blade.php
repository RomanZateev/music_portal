@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm">
            <form action="/search" method="POST" accept-charset="UTF-8">
                {{ csrf_field() }}
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="q" placeholder="Поиск">
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
        <div class="row">
            <div class="col-md-8 bg-white mr-2">
                <div class="row justify-content-md-center pt-2">
                    <img src="/storage/app/img/artists/{{$artist->nameURL}}.jpg" class="rounded img-front" alt="{{$artist->name}}" class="img-front">
                </div>
                <div class="row justify-content-md-center pt-2">
                    <div class="h2 font-weight-bold">{{$artist->name}}</div>
                </div>
                <div class="row">
                    @if ($artist->biograpy)
                        <div class="col">
                            <div class="h4 font-weight-light bg-white text-justify pt-4">{!!nl2br(e($artist->biograpy))!!}</div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col bg-white">
                <div class="row h3 font-weight-light">
                    <div class="col">
                        Композиции
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        @php
                            $songs = $artist->songs()->pluck('name', 'nameURL')->toArray()
                        @endphp
                        @forelse ($songs as $key => $value)
                            <a class="h4 font-weight-light text-dark" class="" href="{{ URL::route('song', $key) }}">
                                <div class="song-hover border-bottom pt-2 pb-2">
                                    <img src="/storage/app/img/songs/{{$key}}.jpg" alt="{{$value}}" width="50" height="50">
                                    {{$value}}
                                </div>
                            </a>
                        @empty
                            <div class="h4 font-weight-light text-dark song-hover border-bottom pt-2 pb-2">
                                У исполнителя еще нет композиций
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection

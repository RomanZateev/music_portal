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
    <div class="row">
        <div class="col-2">
            <div class="h2 font-weight-bold">№</div>
        </div>
        <div class="col-5">
            <div class="h2 font-weight-bold">Треки</div>
        </div>
        <div class="col-5">
            <div class="h2 font-weight-bold">Исполнители</div>
        </div>
    </div>
    @foreach ($songs as $song)
        <div class="row">
            <div class="col-2 pt-3 pb-2">
                <div class="h4 font-weight-light text-secondary">{{ $loop->iteration }}</div>
            </div>
            <div class="col-5 pt-2 pb-2">
                <a class="h4 font-weight-light text-secondary" href="{{ URL::route('song', $song->nameURL) }}">
                    <img src="/storage/app/img/songs/{{$song->nameURL}}.jpg" alt="{{$song->name}}" width="50" height="50">
                    {{$song->name}}
                </a>
            </div>
            <div class="col-5 pt-3 pb-2">
                <div class="h4 font-weight-light text-secondary">
                    <a href="#">{{$song->name}}</a>
                </div>
            </div>
        </div>
    @endforeach
    @if (!empty($message))
        <div class="row top-buffer">
            <div class="col">
                <div class="h4 font-weight-light text-secondary">
                    {{ $message }}
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
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
            <div class="col">
                <img src="/storage/app/img/songs/{{$song->nameURL}}.jpg" alt="" width="300" height="300">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="h2 font-weight-bold">{{$song->name}}</div>
            </div>
        </div>

        @if ($song->textAuthor)
            <div class="row">
                <div class="col">
                    <div class="h4 font-weight-bold">Автор текста: {{$song->textAuthor}}</div>
                </div>
            </div>
        @endif

        @if ($song->musicAuthor)
            <div class="row">
                <div class="col">
                    <div class="h4 font-weight-bold">Автор музыки: {{$song->musicAuthor}}</div>
                </div>
            </div>
        @endif

        @if ($song->album)
            <div class="row">
                <div class="col">
                    <div class="h4 font-weight-bold">Альбом: {{$song->textAuthor}}</div>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col">
                <div class="h4 font-weight-light text-secondary">{{$song->text}}</div>
            </div>
        </div>
    @endif
</div>
@endsection

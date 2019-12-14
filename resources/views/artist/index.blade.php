@extends('layouts.app')

@section('content')
<div class="container">
    @if ($artist)
        <div class="row">
            @if (auth()->check())
    
                @if (auth()->user()->isAdmin())
                    <div class="col">
                        <a class="btn btn-success text-white" href="{{URL::route('artist_create')}}">Добавить пользователя</a>
                    </div>
                    <div class="col">
                        <form class="form-horizontal" action="{{ route('artist_delete',['artist_id'=>$artist->id]) }}" method="post">
                            {{method_field('DELETE')}}
                            {{ csrf_field() }}
                            <button class="btn btn-danger" type="submit">Удалить</button>
                        </form>
                    </div>
                    <div class="col">
                        <form class="form-horizontal" action="{{ route('artist_edit',['artist_id'=>$artist->id]) }}" method="get">
                            {{ csrf_field() }}
                            <button class="btn btn-warning" type="submit">Редактировать</button>
                        </form>
                    </div>
                @endif
    
            @endif
        </div>
        <div class="row">
            <div class="col-md-8 bg-white mr-2">
                <div class="row justify-content-md-center pt-2">
                    <img src="{{$artist->image}}" class="rounded img-front" alt="{{$artist->name}}" class="img-front">
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
                    <div class="col overflow-auto">
                        @forelse ($artist->songs as $song)
                            <a class="h4 font-weight-light text-dark" class="" href="{{ URL::route('song', $song->nameURL) }}">
                                <div class="song-hover border-bottom pt-2 pb-2">
                                    <img src="{{$song->image}}" alt="{{$song->name}}" width="50" height="50">
                                    {{$song->name}}
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

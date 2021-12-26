@extends('layouts.app')

@section('content')

<div class="container">
    @if ($song)
        <div class="row">
            @if (auth()->check())
                @if (auth()->user()->isAdmin())
                    <div class="col">
                        <form class="form-horizontal" action="{{ route('song_delete',['song_id'=>$song->id]) }}" method="post">
                            {{method_field('DELETE')}}
                            {{ csrf_field() }}
                            <button class="btn btn-danger btn-lg" type="submit">Удалить</button>
                        </form>
                    </div>
                    <div class="col">
                        <form class="form-horizontal" action="{{ route('song_edit', ['song_id'=>$song->id]) }}" method="get">
                            {{ csrf_field() }}
                            <button class="btn btn-warning btn-lg" type="submit">Редактировать</button>
                        </form>
                    </div>
                @endif
            @endif
        </div>
        <div class="row bg-white rounded">
            <div class="col-md-auto m-2">
                <img src="{{$song->image}}" class="rounded img-front image zoom" width="300" height="300" alt="{{$song->name}}">
            </div>
            <div class="col m-2">
                <div class="h2 font-weight-bold">{{$song->name}}</div>
                <div class="h4 font-weight-bold">
                    Исполнители:
                    <div class="col">
                        @foreach ($song->artists as $artist){{ $loop->first ? '' : ', ' }}
                            <div class="row">
                                <div class="col-md-auto m-2">
                                    <a class="" href="{{ URL::route('artist', $artist->id)}}">{{$artist->name}}</a>
                                </div>
                                <div class="col m-2">
                                    @if (auth()->check())
                                        @if (auth()->user()->isAdmin())
                                            <form class="form-inline" action="{{ route('song_delete_artist',['song_id'=>$song->id, 'artist_id'=>$artist->id]) }}" method="post">
                                                {{method_field('DELETE')}}
                                                {{ csrf_field() }}
                                                <button class="btn btn-danger" type="submit">Удалить</button>
                                            </form>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        @endforeach

                        @if (auth()->check())
                            @if (auth()->user()->isAdmin())
                                <form method="POST" action="{{route('song_add_artist', $song->id)}}">

                                    <select name="artist_id" class="form-control">
                                        @foreach ($artists as $artist)
                                            <option value="{{$artist->id}}">{{$artist->name}}</option>
                                        @endforeach
                                    </select>

                                    <input type="hidden" name="song_id" value="{!! $song->id !!}">

                                    <button class="btn btn-success" type="submit">Добавить исполнителя</button>
                                    {{ csrf_field() }} 
                                </form>
                            @endif
                        @endif
                    </div>
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

                @if (Auth::check())
                    <form class="form-horizontal" action="{{ route('like', ['song_id'=>$song->id]) }}" method="get">
                                {{ csrf_field() }}
                                <button class="btn btn-light btn-lg" type="submit">
                                <img class="image_off" src="/storage/app/img/actions/heart-active.png" alt="heart-active">
                                Лайк: {{$likes}}</button>
                            </form>
                        <!-- <a href="" class="heart" id="{{$song->id}}">
                            <img class="image_on" src="/storage/app/img/actions/heart.png" alt="heart">
                            <img class="image_off" src="/storage/app/img/actions/heart-active.png" alt="heart-active">
                        </a> -->
                    </form>
                @endif
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
    @endif
</div>
@endsection

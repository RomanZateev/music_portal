
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <form method="POST" action="{{route('user_update')}}">
            <div class="form-group">
                <label for="" class="about-form">Имя</label>
                <input autocomplete="off" type="text" name="name" class='form-control width' value="{!! $user->name !!}">

                <label for="" class="about-form">e-mail</label>
                <input autocomplete="off" type="email" name="email" class='form-control width' value="{!! $user->email !!}">

                <!-- <label for="" class="about-form">Тип</label>
                <select name="type" class="form-control width">
                    <option value="default">default</option>
                    <option value="admin">admin</option>
                </select> -->

                <input type="hidden" name="id" value="{!! $user->id !!}">
            </div>
            <button class="btn btn-success" type="submit">Сохранить</button>
            {{ csrf_field() }}            
        </form>
    </div>
    @if ($songs ?? '')
        @foreach ($songs as $song)
            <a class="h4 font-weight-light text-secondary" href="{{ URL::route('song', $song->id) }}">
                <div class="row song-hover border-bottom rounded track-line">
                    <div class="col-2 pt-3 pb-2">
                        <div class="h4 font-weight-light text-secondary">
                            {{ ($songs ->currentpage()-1) * $songs ->perpage() + $loop->index + 1 }}
                        </div>
                    </div>
                    <div class="col-5 pt-2 pb-2">
                        <img src="{{$song->image}}" alt="{{$song->name}}" width="50" height="50">
                        {{$song->name}}
                    </div>
                    <div class="col-5 pt-3 pb-2">
                        <div class="h4 font-weight-light text-secondary">
                            {{$song->artists()->pluck('name')->implode(', ')}}
                        </div>
                    </div>
                </div>
            </a>

            <form class="form-horizontal" action="{{ route('like', ['song_id'=>$song->id]) }}" method="get">
                                {{ csrf_field() }}
                                <button class="btn btn-danger btn-lg" type="submit">Удалить</button>
                            </form>
        @endforeach

        <div class="row pt-2 justify-content-md-center">
            {{ $songs->links() }}
        </div>
    @endif
</div>

@endsection
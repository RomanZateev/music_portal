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
    <div class="row">
        <div class="col-sm">
            <div class="h2 font-weight-bold">№</div>
        </div>
        <div class="col-sm">
            <div class="h2 font-weight-bold">Треки</div>
        </div>
        <div class="col-sm">
            <div class="h2 font-weight-bold">Исполнители</div>
        </div>
    </div>
    @foreach ($songs as $song)
        <div class="row">
            <div class="col-sm">
                <div class="h4 font-weight-light text-secondary">{{ $loop->iteration }}</div>
            </div>
            <div class="col-sm">
                <a class="h4 font-weight-light text-secondary nounderline" href="{{ URL::route('song', $song->nameURL) }}">{{$song->name}}</a>
            </div>
            <div class="col-sm">
                <div class="h4 font-weight-light text-secondary">{{$song->name}}</div>
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
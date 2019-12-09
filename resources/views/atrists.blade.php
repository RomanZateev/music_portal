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
                <img src="/storage/app/img/songs/{{$artist->nameURL}}.jpg" alt="" width="300" height="300">
            </div>
            <div class="col-8">
                <div class="h2 font-weight-bold">{{$artist->name}}</div>
            </div>
        </div>
        @if ($song->notes)
            <div class="h4 font-weight-light top-buffer bg-white">{!! nl2br(e($artist->notes)) !!}</div>          
        @endif
        <div class="row top-buffer bg-white">
            @foreach ($artist->songs as $song)
                <div class="h4 font-weight-bold">{{$song->name}}</div>
            @endforeach
        </div>
    @endif
</div>
@endsection

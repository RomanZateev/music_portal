@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <form action="/search" method="POST" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" name="q" placeholder="Введите трек или исполнителя"> 
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-default">
                        <span class="fa fa-search"></span>
                    </button>
                </span>
            </div>
        </form>
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
    @forelse ($songs as $song)
        <div class="row">
            <a class="h4 font-weight-light text-secondary nounderline" href="{{ route('login') }}">
                <div class="form-inline">
                    <div class="col-sm">
                        <div>{{ $song->name }}</div>
                    </div>
                </div>
            </a>
        </div>
    @empty
        <div class="row">
            <div class="col">
                <div>К сожалению, ничего не найдено</div>
            </div>
        </div>
    @endforelse
</div>
@endsection
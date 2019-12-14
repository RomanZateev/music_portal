@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row bg-white">
        <div class="col-4">
            <div class="row">
                @if ($russian ?? '')
                    @foreach ($russian as $letter)
                        <div class="col">
                            <a class="h4 font-weight-light text-secondary" href="{{ URL::route('search_artist', $letter) }}">
                                {{$letter}}
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="col">

        </div>
        <div class="col-4">
            <div class="row">
                @if ($english ?? '')
                    @foreach ($english as $letter)
                        <div class="col">
                            <a class="h4 font-weight-light text-secondary" href="{{ URL::route('search_artist', $letter) }}">
                                {{$letter}}
                            </a>
                        </div>   
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        @if ($artists ?? '')
            @forelse ($artists as $artist)
                <div class="col-2 song-hover pt-2 pb-2 ml-20">
                    <a class="h4 font-weight-light text-dark" class="" href="{{ URL::route('artist', $artist->nameURL) }}">
                        <div class="row justify-content-md-center">
                            <img src="{{$artist->image}}" alt="{{$artist->name}}" width="150" height="150" class="rounded-circle">
                        </div>
                        <div class="row justify-content-md-center">
                            {{$artist->name}}
                        </div>
                    </a>
                </div>
            @empty
                <div class="h4 font-weight-light text-dark song-hover border-bottom pt-2 pb-2">
                    Исполнители не найдены
                </div>
            @endforelse
        @endif
    </div>
    @if ($artists ?? '')
        <div class="row pt-2 justify-content-md-center">
            {{ $artists->links() }}
        </div>
    @endif

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
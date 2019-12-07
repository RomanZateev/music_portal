@extends('layouts.app')

<!-- -->
<script type="text/javascript" src="https://vk.com/js/api/openapi.js?162"></script>

<script type="text/javascript">
    VK.init({apiId: 7188138, onlyWidgets: true});
  </script>

@section('content')
<div class="container">
    <div class="row">
        @forelse ($songs as $song)
            <div>{{ $song->name }}</div>
        @empty
            <div>К сожалению, ничего не найдено</div>
        @endforelse

        @forelse ($singers as $singer)
            <div>{{ $singer->name }}</div>
        @empty
            <div>К сожалению, ничего не найдено</div>       
        @endforelse
    </div>
</div>
@endsection
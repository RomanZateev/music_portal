@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <a class="btn btn-success btn-lg mb-4 text-white" href="{{URL::route('user_create')}}">Добавить пользователя</a>
    </div>
    <div class="row">
        <div class="col-1">
            <div class="h2 font-weight-bold">№</div>
        </div>
        <div class="col-3">
            <div class="h2 font-weight-bold">Имя пользователя</div>
        </div>
        <div class="col-1">
            <div class="h2 font-weight-bold">Тип</div>
        </div>
        <div class="col-4">
            <div class="h2 font-weight-bold">e-mail</div>
        </div>
    </div>
    @if ($users ?? '')
        @foreach ($users as $user)
                <div class="row border-bottom h4 font-weight-light text-secondary">
                    <div class="col-1 pt-2 pb-2">
                        <div class="h4 font-weight-light text-secondary">
                            {{ ($users->currentpage()-1) * $users ->perpage() + $loop->index + 1 }}
                        </div>
                    </div>
                    <div class="col-3 pt-2 pb-2">
                        {{$user->name}}
                    </div>
                    <div class="col-1 pt-2 pb-2">
                        {{$user->type}}
                    </div>
                    <div class="col-4 pt-2 pb-2">
                        {{$user->email}}
                    </div>
                    <div class="col">
                        <form class="form-horizontal" action="{{ route('user_delete',['user_id'=>$user->id]) }}" method="post">
                            {{method_field('DELETE')}}
                            {{ csrf_field() }}
                            <button class="btn btn-danger" type="submit">Удалить</button>
                        </form>
                    </div>
                    <div class="col">
                        <form class="form-horizontal" action="{{ route('user_edit',['user_id'=>$user->id]) }}" method="get">
                            {{ csrf_field() }}
                            <button class="btn btn-warning" type="submit">Редактировать</button>
                        </form>
                    </div>
                </div>
        @endforeach

        <div class="row pt-2 justify-content-md-center">
            {{ $users->links() }}
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
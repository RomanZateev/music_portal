@extends('layouts.app')

@section('content')
<div class="container bg-white height rounded-lg">
    <div class="row mt-4 pt-2">
        <div class="col">
            <div class="row h3 justify-content-md-center">
                <span>
                    Дорогие Друзья, посетители нашего сайта!
                </span>
            </div>
            <div class="row h4">
                <p>
                    <span style="font-weight: 400;" class="font">
                        Мы рады Вас приветствовать на страницах нашего сайта, посвященного русским, украинским и зарубежным текстам песен. Сразу сообщим, что наш ресурс достаточно молодой, но мы амбициозны в наших начинаниях и поэтому будем стараться публиковать как можно больше правильных и популярных текстов песен. Мы преследуем цель постоянно следить за рейтингом наиболее популярных отчественных и зарубежных песен и соответственно размещать на эти песни тексты.
                    </span>
                </p>
                <p>
                    <span style="font-weight: 400;" class="font">
                        Всех посетителей призываем быть активными и по-возможности принимать участие в развитии портала путём "засыла" правильных текстов нашим редакторам;), а мы в свою очередь обязуемся их опративно размещать.
                    </span>
                </p>
            </div>
            <div class="row">
                <div class="col">
                    <div class="float-right">
                        
                        <a href="{{ route('songs') }}" class="btn btn-lg btn-outline-dark" role="button" aria-disabled="true">
                            Композиции
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="float-left">
                        <a href="{{ route('artists') }}" class="btn btn-lg btn-outline-dark" role="button" aria-disabled="true">
                            Исполнители
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4 pt-2 justify-content-md-center">
        <img src="/storage/app/img/index.ym.jpg" alt="" width="800" height="800">
    </div>
    <div class="row mt-4 pt-2 justify-content-md-center">
        <img src="/storage/app/img/index.vk.jpg" alt="" width="800" height="800">
    </div>
    <div class="row mt-4 pt-2 justify-content-md-center">
        <video src="/storage/app/img/index.video.mp4" autoplay="autoplay" loop="loop" muted="muted"></video>
    </div>
</div>
@endsection

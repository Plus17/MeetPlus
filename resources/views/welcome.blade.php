@extends('layouts.layout')

@section('content')

    @if ($events)

        @foreach ($events as $event)

            <article class="post clearfix">
                <a href="#" class="thumb pull-left">
                    <img class="img-thumbnail" src="images/img1.jpg" alt="">
                </a>
                <h2 class="post-title">
                    <a href="#">{{ $event->name }}</a>
                </h2>
                <p><span class="post-fecha">{{ $event->start }}</span> por <span class="post-autor"><a href="#">{{ $event->user->name }}</a></span></p>
                <p class="post-contenido text-justify">
                    {{ $event->description }}
                </p>

                <div class="contenedor-botones">
                    <a href="#" class="btn btn-primary">Leer Mas</a>
                    <a href="#" class="btn btn-success">Comentarios <span class="badge">20</span></a>
                </div>
            </article>

        @endforeach

    @endif

@endsection

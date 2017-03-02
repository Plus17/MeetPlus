@extends('layouts.layout')

@section('content')

    @component('components/event_show')
        @slot('name', $event->name)

        @slot('start', $event->start)

        @slot('userName', $event->user->name)

        @slot('description', $event->description)

        @slot('category', $event->category->name)

        @slot('start', $event->start )

        @slot('end', $event->end )

        @slot('place', $event->place )
    @endcomponent

@endsection

@section('comments')

    @if (! $comments->isEmpty())
        @foreach ($comments as $comment)
            <div class="">
                <p>Autor: {{ $comment->user->name }}</p>
                <p>Comentario: </p>
                <p>{{ $comment->comment }}</p>
            </div>
        @endforeach
    @else
        <p>No hay comentarios</p>
    @endif

@endsection

@section('form.comments')

    @if (Auth::check())
        @include('Components.event.form_comments')
    @endif

@endsection

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

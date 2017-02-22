@extends('layouts.dashboard')

@section('content')

    @if($event)
        {!!  Form::model($event, array('method' => 'PUT', 'route' => ['events.update', $event->id]) ) !!}
            @include('Event.form.event')
        {!! Form::close() !!}
    @endif

@endsection

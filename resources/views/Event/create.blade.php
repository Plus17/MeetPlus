@extends('layouts.dashboard')

@section('content')

    {!! Form::open(array('method' => 'POST' ,'url' => route('events.store') )) !!}
        @include('Event.form.event')
    {!! Form::close() !!}

@endsection

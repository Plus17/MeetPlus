@if(Session::has('message'))
    @component('Components.dashboard.message')
         {{ Session::get('message') }}
    @endcomponent
@endif
@include('Components.dashboard.errors')

{!! Form::open(['method' => 'POST', 'route' => 'event.comment.store', 'class' => 'form-horizontal']) !!}

{{ csrf_field() }}

<div class="form-group">
    {!! Form::label('comment', 'Publica un comentario') !!}
    {!! Form::textarea('comment', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('comment') }}</small>
</div>

    {!! Form::number('user_id', Auth::user()->id, ['style' => 'display: none;']) !!}
    {!! Form::number('event_id', $event->id, ['style' => 'display: none;']) !!}

<div class="btn-group">
    {!! Form::reset("Reset", ['class' => 'btn btn-warning']) !!}

    {!! Form::submit("Enviar", ['class' => 'btn btn-success']) !!}
</div>

{!! Form::close() !!}

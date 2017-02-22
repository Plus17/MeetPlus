{{ csrf_field() }}
<div class="grupo">

        <div class="form-group">
            {!! Form::label('name', 'Nombre del Evento') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('name') }}</small>

            {!! Form::label('place', 'Lugar del Evento') !!}
            {!! Form::text('place', null, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('place') }}</small>
        </div>

        <div class="form-group">
            {!! Form::label('start', 'Fecha de inicio del Evento') !!}
            {!! Form::date('start', \Carbon\Carbon::now(), ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('start') }}</small>

            {!! Form::label('end', 'Fecha de finalización del Evento') !!}
            {!! Form::date('end', \Carbon\Carbon::now(), ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('end') }}</small>
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Descripción del evento') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('description') }}</small>
        </div>

        <div class="form-group">
            {!! Form::label('categoria', 'Elija una categoria') !!}
            {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'required' => 'required']) !!}

            {!! Form::label('Estatus', 'Estatus del evento') !!}
            {!! Form::select('status', array('active' => 'Active', 'finished' => 'Finished', 'canceled' => 'Canceled' ), 'active', ['class' => 'form-control', 'required' => 'required']) !!}

            {!! Form::number('user_id', Auth::user()->id,['style' => 'display: none;']) !!}
        </div>

        <div class="btn-group">
            {!! Form::reset("Reset", ['class' => 'btn btn-warning']) !!}

            {!! Form::submit("Registrar", ['class' => 'btn btn-success']) !!}
        </div>

</div>

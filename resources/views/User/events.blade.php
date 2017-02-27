@extends('layouts.dashboard')

@section('content')

            <p>
            Esto son todos los eventos que haz registrado, puedes verlos en detalle, editarlos o
            siempre puedes crear uno nuevo:
            <a href="{{ route('events.create') }}" class="btn btn-info">Crear <span class="glyphicon glyphicon-new-window"></span></a>
            </p>

            @if(count($events)>0)
                @foreach($events as $event)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Fecha</th>
                                    <th>Lugar</th>
                                    <th>Categoria</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $event->name }}</td>
                                    <td>{{ $event->start }}</td>
                                    <td>{{ $event->place }}</td>
                                    <td>{{ $event->category->name }}</td>
                                    <td>
                                        <a href="{{ route('event.show', $event->slug) }}" class="btn btn-info" target="_blank"><span class="glyphicon glyphicon-floppy-open"></span></a>
                                        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span></a>
                                        <a href="{{ route('events.destroy', $event->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @endforeach
            @else
                <p>No hay eventos que mostrar</p>
            @endif
            {!! $events->render() !!}

@endsection

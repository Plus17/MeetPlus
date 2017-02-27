@extends('layouts.dashboard')

@section('content')

    @if(count($users)>0)
        @foreach($users as $user)
            <div class="row">
                <div class="col-md-6 col-md-offset-3">

                    <div class="table table-hover">
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        <a href="#" class="btn btn-info" target="_blank"><span class="glyphicon glyphicon-floppy-open"></span></a>
                                        <a href="#" class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span></a>
                                        <a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle"></span></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        @endforeach
    @else
        <p>No hay usuarios que mostrar</p>
    @endif
    {!! $users->render() !!}

@endsection

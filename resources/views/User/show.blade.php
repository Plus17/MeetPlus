@extends('layouts.dashboard')

@section('content')

    <div class="row">
                    <div class="col-lg-6">
                        <h2>My info</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Number of events</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->events()->count() }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

@endsection

@extends('layouts.app')
@section('title')
    Usuarios
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Usuarios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-warning" href="{{ route('users.create') }}">Nuevo</a>
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777ef">
                                    <tr>
                                        <th style="display: none">ID</th>
                                        <th style="color: white">Nombres</th>
                                        <th style="color: white">Apellidos</th>
                                        <th style="color: white">Correo</th>
                                        <th style="color: white">Rol</th>
                                        <th style="color: white">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td style="display: none">{{ $user->id }}</td>
                                            <td>{{ $user->names }}</td>
                                            <td>{{ $user->surnames }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @foreach ($user->roles as $role)
                                                    <span class="badge badge-dark">{{ $role->name }}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                <a class="btn btn-info" href="{{ route('users.edit', $user->id) }}">
                                                    Editar
                                                </a>
                                                {{ Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete', 'style' => 'display: inline-block']) }}
                                                {{ Form::submit('Eliminar', ['class' => 'btn btn-danger']) }}
                                                {{ Form::close() }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-content-end">
                                {!! $users->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

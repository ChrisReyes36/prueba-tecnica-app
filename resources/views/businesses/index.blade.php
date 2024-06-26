@extends('layouts.app')
@section('title')
    Negocios
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Negocios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('business-create')
                                <a class="btn btn-warning" href="{{ route('businesses.create') }}">Nuevo</a>
                            @endcan
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777ef">
                                    <th style="color: white">Nombre</th>
                                    <th style="color: white">Descripción</th>
                                    <th style="color: white">Cliente</th>
                                    <th style="color: white">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($businesses as $business)
                                        <tr>
                                            <td>{{ $business->name }}</td>
                                            <td>{{ $business->description }}</td>
                                            <td>{{ $business->user->names }}</td>
                                            <td>
                                                @can('business-edit')
                                                    <a class="btn btn-primary"
                                                        href="{{ route('businesses.edit', $business->id) }}">Editar</a>
                                                @endcan
                                                @can('business-delete')
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['businesses.destroy', $business->id], 'style' => 'display:inline']) !!}
                                                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-content-end">
                                {!! $businesses->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

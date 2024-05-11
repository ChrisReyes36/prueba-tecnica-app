@extends('layouts.app')
@section('title')
    Items del Menú
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Items del Menú</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('menu-item-create')
                                <a class="btn btn-warning" href="{{ route('menu-items.create') }}">Nuevo</a>
                            @endcan
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777ef">
                                    <th style="color: white">Nombre</th>
                                    <th style="color: white">Descripción</th>
                                    <th style="color: white">Precio</th>
                                    <th style="color: white">Categoría</th>
                                    <th style="color: white">Negocio</th>
                                    <th style="color: white">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($menuItems as $menuItem)
                                        <tr>
                                            <td>{{ $menuItem->name }}</td>
                                            <td>{{ $menuItem->description }}</td>
                                            <td>${{ $menuItem->price }}</td>
                                            <td>{{ $menuItem->categoryItem->name }}</td>
                                            <td>{{ $menuItem->business->name }}</td>
                                            <td>
                                                @can('menu-item-edit')
                                                    <a class="btn btn-primary"
                                                        href="{{ route('menu-items.edit', $menuItem->id) }}">Editar</a>
                                                @endcan
                                                @can('menu-item-delete')
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['menu-items.destroy', $menuItem->id], 'style' => 'display:inline']) !!}
                                                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-content-end">
                                {!! $menuItems->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

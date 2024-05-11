@extends('layouts.app')
@section('title')
    Categorías Item
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Categorías Item</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('category-item-create')
                                <a class="btn btn-warning" href="{{ route('category-items.create') }}">Nuevo</a>
                            @endcan
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777ef">
                                    <th style="color: white">Nombre</th>
                                    <th style="color: white">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($categoryItems as $categoryItem)
                                        <tr>
                                            <td>{{ $categoryItem->name }}</td>
                                            <td>
                                                @can('category-item-edit')
                                                    <a class="btn btn-primary"
                                                        href="{{ route('category-items.edit', $categoryItem->id) }}">Editar</a>
                                                @endcan
                                                @can('category-item-delete')
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['category-items.destroy', $categoryItem->id], 'style' => 'display:inline']) !!}
                                                    {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-content-end">
                                {!! $categoryItems->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

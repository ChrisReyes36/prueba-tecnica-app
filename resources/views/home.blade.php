@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dashboard</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @can('business-list')
                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-pink order-card">
                                            <div class="card-block">
                                                <h5>Negocios</h5>
                                                <h2 class="text-right"><i
                                                        class="fa fa-user-lock f-left"></i><span>{{ $cant_businesses }}</span>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xl-12">
                                        <h5>Top 20 de Nuevos Negocios</h5>
                                        {!! Form::open(['route' => 'home', 'method' => 'GET', 'class' => 'form-inline']) !!}
                                        <div class="form-group">
                                            {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Buscar']) !!}
                                            {!! Form::submit('Buscar', ['class' => 'btn btn-primary ml-2']) !!}
                                            <a href="{{ route('home') }}" class="btn btn-warning ml-2">Limpiar</a>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                    <div class="col-md-12 col-xl-12">
                                        <table class="table table-striped mt-2">
                                            <thead style="background-color: #6777ef">
                                                <th style="color: white">Nombre</th>
                                                <th style="color: white">Descripción</th>
                                                <th style="color: white">Cliente</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($businesses as $business)
                                                    <tr>
                                                        <td>{{ $business->name }}</td>
                                                        <td>{{ $business->description }}</td>
                                                        <td>{{ $business->user->names }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="pagination justify-content-end">
                                            {!! $businesses->links() !!}
                                        </div>
                                    </div>
                                @endcan

                                @can('menu-item-list')
                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-c-green order-card">
                                            <div class="card-block">
                                                <h5>Items Menú</h5>
                                                <h2 class="text-right"><i
                                                        class="fa fa-users f-left"></i><span>{{ $cant_menu_items }}</span>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xl-12">
                                        <h5>Top 20 de Nuevos Items de Menú</h5>
                                        {!! Form::open(['route' => 'home', 'method' => 'GET', 'class' => 'form-inline']) !!}
                                        <div class="form-group">
                                            {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Buscar']) !!}
                                            {!! Form::submit('Buscar', ['class' => 'btn btn-primary ml-2']) !!}
                                            <a href="{{ route('home') }}" class="btn btn-warning ml-2">Limpiar</a>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                    <div class="col-md-12 col-xl-12">
                                        <table class="table table-striped mt-2">
                                            <thead style="background-color: #6777ef">
                                                <th style="color: white">Nombre</th>
                                                <th style="color: white">Descripción</th>
                                                <th style="color: white">Precio</th>
                                                <th style="color: white">Categoría</th>
                                                <th style="color: white">Negocio</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($menuItems as $menuItem)
                                                    <tr>
                                                        <td>{{ $menuItem->name }}</td>
                                                        <td>{{ $menuItem->description }}</td>
                                                        <td>${{ $menuItem->price }}</td>
                                                        <td>{{ $menuItem->categoryItem->name }}</td>
                                                        <td>{{ $menuItem->business->name }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="pagination justify-content-end">
                                            {!! $menuItems->links() !!}
                                        </div>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

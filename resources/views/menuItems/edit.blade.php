@extends('layouts.app')
@section('title')
    Editar item de menú
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar item de menú</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong>¡Revisa los campos!</strong>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger">{{ $error }}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            {!! Form::model($menuItem, ['route' => ['menu-items.update', $menuItem->id], 'method' => 'patch']) !!}
                            <div class="row">
                                <div class="col-md-12 col-xl-12">
                                    <div class="form-group">
                                        {!! Form::label('name', 'Nombre') !!}
                                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md-12 col-xl-12">
                                    <div class="form-group">
                                        {!! Form::label('description', 'Descripción') !!}
                                        {!! Form::text('description', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md-12 col-xl-12">
                                    <div class="form-group">
                                        {!! Form::label('price', 'Precio') !!}
                                        {!! Form::text('price', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md-12 col-xl-12">
                                    <div class="form-group">
                                        {!! Form::label('category_item_id', 'Categoría') !!}
                                        {!! Form::select('category_item_id', $categoryItems, null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md-12 col-xl-12">
                                    <div class="form-group">
                                        {!! Form::label('business_id', 'Negocio') !!}
                                        {!! Form::select('business_id', $businesses, null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md-12 col-xl-12">
                                    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                                    <a href="{{ route('menu-items.index') }}" class="btn btn-danger">Cancelar</a>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

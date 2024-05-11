@extends('layouts.app')
@section('title')
    Editar Negocio
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Negocio</h3>
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

                            {!! Form::model($business, ['route' => ['businesses.update', $business->id], 'method' => 'PUT']) !!}
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
                                        {!! Form::label('user_id', 'Clientes') !!}
                                        {!! Form::select('user_id[]', $userClientes, null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md-12 col-xl-12">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <a class="btn btn-danger" href="{{ route('businesses.index') }}">Cancelar</a>
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

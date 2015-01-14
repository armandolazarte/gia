@extends('layouts.adminRoot')

@section('body')
    {{ Form::open(array('action' => 'ModuloController@store')) }}

    {{ Form::label('ruta', 'Ruta:') }}
    {{ Form::text('ruta', '') }}

    {{ Form::label('nombre', 'Nombre:') }}
    {{ Form::text('nombre', '') }}

    {{ Form::label('icnono', 'Icono:') }}
    {{ Form::text('icono', '') }}

    {{ Form::label('orden', 'Orden:') }}
    {{ Form::text('orden', '') }}

    {{ Form::label('activo', 'Activo:') }}
    {{ Form::checkbox('activo', '1', true) }}

    {{ Form::submit('Crear') }}
    {{ Form::close() }}
@stop
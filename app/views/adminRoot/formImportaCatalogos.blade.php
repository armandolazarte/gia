@extends('layouts.adminRoot')

@section('body')
    {{ Form::open(array('action' => 'ImportaCatalogosController@importar')) }}
    {{ Form::label('db_origen', 'Base de Datos Origen:') }}
    {{ Form::text('db_origen') }}
    {{ Form::select('tabla', array('URG','Fondos', 'Proyectos', 'Cuentas', 'Beneficiarios', 'COG')) }}
    {{ Form::close() }}
@stop
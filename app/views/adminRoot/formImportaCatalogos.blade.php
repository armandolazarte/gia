@extends('layouts.adminRoot')

@section('body')
    {{ Form::open(array('action' => 'ImportaCatalogosController@importar')) }}
    {{ Form::label('db_origen', 'Base de Datos Origen:') }}
    {{ Form::text('db_origen') }}
    {{ Form::select('catalogo', array(
                                        'URG' => 'URG',
                                        'Fondos' => 'Fondos',
                                        'Proyectos' => 'Proyectos',
                                        'Cuentas' => 'Cuentas',
                                        'Beneficiarios' => 'Beneficiarios',
                                        'COG' => 'COG')
                    ) }}
    {{ Form::submit('Importar') }}
    {{ Form::close() }}
@stop
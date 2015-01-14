@extends('layouts.adminRoot')

@section('body')

<a href="{{ action('ModuloController@create') }}">Capturar Modulo</a>

@if( count($modulos) > 0 )
    <table border="1">
        <thead><tr>
            <th>ID</th>
            <th>Ruta</th>
            <th>Nombre</th>
            <th>Icono</th>
            <th>Orden</th>
            <th>Activo</th>
        </tr></thead>
        @foreach($modulos as $modulo)
        <tr>
            <td>{{ $modulo->id }}</td>
            <td>{{ $modulo->ruta }}</td>
            <td>{{ $modulo->nombre }}</td>
            <td>{{ $modulo->icono }}</td>
            <td>{{ $modulo->orden }}</td>
            <td>{{ $modulo->activo }}</td>
        </tr>
        @endforeach
    </table>
@else
    <h3>No hay modulos</h3>
@endif

@stop
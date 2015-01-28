@extends('layouts.base')

@section('contenido')
    <h3>Verificar Proyecto a Importar</h3>
    <table>
        <tr>
            <td>Proyecto</td><td>{{ $proyecto }} {{ $nombre }}</td>
        </tr>
        <tr>
            <td>URG</td><td>{{ $urg }} {{ $d_urg }}</td>
        </tr>
        <tr>
            <td>Fondo</td><td>{{ $fondo }}</td>
        </tr>
        <tr>
            <td>Monto</td><td>{{ $monto }}</td>
        </tr>
    </table>

    <table>
        <thead><tr>
            <th>Objetivo</th> <th>RM</th> <th>COG</th> <th>Monto</th>
        </tr></thead>
        @foreach($partidas as $partida => $val)
            <tr>
                <td>{{ $val['objetivo'] }}</td>
                <td>{{ $partida }}</td>
                <td>{{ $val['cog'] }}</td>
                <td>{{ $val['monto'] }}</td>
            </tr>
        @endforeach
    </table>

    {{ Form::open(array('action' => 'ImportarProyectoController@store')) }}
    {{ Form::submit('Importar Información') }}
    {{ Form::close() }}

@stop
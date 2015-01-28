@extends('layouts.base')

@section('css')
    @parent
    <link href="{{ asset('assets/css/dropzone.css') }}" rel="stylesheet" type="text/css" media="screen">
@stop

@section('contenido')

    <form action="{{ action('ImportarProyectoController@postUpload') }}" class="dropzone" id="gia-dropzone">
        <div class="fallback">
            <input name="file" type="file" multiple>
        </div>
    </form>

    <table>
    @foreach($files as $file)
        <td><a href="{{ action('ImportarProyectoController@convertir') }}">{{ $file }}</a></td>
        <td>
            <form action="{{ action('ImportarProyectoController@convertir') }}" method="post">
                <input type="hidden" name="fileName" value="{{ $file }}">
                <button type="submit">Importar</button>
            </form>
        </td>
    @endforeach
    </table>
@stop

@section('js')
    @parent
    <script src="{{ asset('assets/js/plugins/dropzone/dropzone.js') }}"></script>
@stop
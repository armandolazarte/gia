@extends('layouts.base')

@section('css')
@parent
<link href="{{ asset('assets/css/dropzone.css') }}" rel="stylesheet" type="text/css" media="screen">
@stop

@section('contenido')

    <form action="upload" class="dropzone" id="gia-dropzone">
        <div class="fallback">
            <input name="file" type="file" multiple>
        </div>
    </form>

@stop

@section('js')
    @parent
    <script src="{{ asset('assets/js/plugins/dropzone/dropzone.js') }}"></script>
@stop
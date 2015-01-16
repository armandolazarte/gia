@extends('layouts.base')

@section('contenido')

    {{ Form::open(array('action' => 'UsuarioController@store')) }}

{{-- @foreach($errors->get('username', '<span>:message</span>') as $message) --}}
    @foreach($errors->get('username') as $message)
        {{ $message }}
    @endforeach
    {{ Form::label('username', 'Código') }}
    {{ Form::text('username') }}

    @foreach($errors->get('nombre') as $message)
        {{ $message }}
    @endforeach
    {{ Form::label('nombre', 'Nombre') }}
    {{ Form::text('nombre') }}

    @foreach($errors->get('email') as $message)
        {{ $message }}
    @endforeach
    {{ Form::label('email', 'Correo Electrónico') }}
    {{ Form::text('email') }}

    @foreach($errors->get('password') as $message)
        {{ $message }}
    @endforeach
    {{ Form::label('password', 'Contraseña') }}
    {{ Form::password('password') }}

    @foreach($errors->get('password_confirmation') as $message)
        {{ $message }}
    @endforeach
    {{ Form::label('password_confirmation', 'Confirmar Contraseña') }}
    {{ Form::password('password_confirmation') }}

    @foreach($errors->get('cargo') as $message)
        {{ $message }}
    @endforeach
    {{ Form::label('cargo', 'Cargo') }}
    {{ Form::text('cargo') }}

    @foreach($errors->get('prefijo') as $message)
        {{ $message }}
    @endforeach
    {{ Form::label('prefijo', '') }}
    {{ Form::text('prefijo') }}

    @foreach($errors->get('iniciales') as $message)
        {{ $message }}
    @endforeach
    {{ Form::label('iniciales', 'Iniciales') }}
    {{ Form::text('iniciales') }}

    @foreach($roles as $role)
        {{ Form::label('roles[]', $role->role_name) }}
        {{ Form::checkbox('roles[]', $role->id, false) }}
    @endforeach

    {{ Form::submit('Aceptar') }}

    {{ Form::close() }}
@stop
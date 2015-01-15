{{-- LOGIN FORM --}}

{{ Form::open(array('route' => 'sessions.store')) }}

{{ Form::label('username', 'Usuario:') }}
{{ Form::text('username') }}

{{ Form::label('password', 'Contraseña:') }}
{{ Form::password('password') }}

{{ Form::submit() }}

{{ Form::close() }}
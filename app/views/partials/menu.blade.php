<ul>
@foreach($modulos as $modulo)
    <li><a href="{{ $modulo->ruta }}">{{ $modulo->nombre }}</a></li>
@endforeach
</ul>
    <table border="1">
        <thead>
            <tr> <td>Documento / Tipo</td> <td>URG</td> <td>Estatus</td> <td>No. Débito</td> </tr>
        </thead>

{{-- Información y formulario para seleccionar un documento --}}
@if( count($altas) > 0 )
    @foreach( $altas as $alta )
        <tr>
            <td><a href="{{ action('AltaController@info', array($alta->id)) }}">{{ $alta->doc_id }} {{ $alta->tipo }}</a></td>
            <td>{{ $alta->urg->urg }} {{ $alta->urg->d_urg }}</td>
            <td>{{ $alta->estatus }}</td>
            <td>{{ $alta->debito }}</td>
        </tr>
    @endforeach
        </table>

{{-- Información de un documento --}}
@elseif(!empty($alta->id))
        <tr>
            <td>{{ $alta->doc_id }} {{ $alta->tipo }}</td>
            <td>{{ $alta->urg->urg }} {{ $alta->urg->d_urg }}</td>
            <td>{{ $alta->estatus }}</td>
            <td>{{ $alta->debito }}</td>
        </tr>
        </table>
    {{ Form::open(array('action' => 'AltaController@formDebito')) }}
    {{ Form::hidden('id', $alta->id) }}
    {{ Form::submit('Editar') }}
    {{ Form::close() }}
@else
    </table>
    <h2>No hay registros</h2>
@endif
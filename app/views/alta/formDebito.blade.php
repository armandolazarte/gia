{{ Form::open(array('action' => 'AltaController@formDebitoProcesa')) }}
    <table border="1">
        <thead>
            <tr> <td>Documento / Tipo</td> <td>URG</td> <td>Estatus</td> </tr>
        </thead>
        <tr>
            <td>{{ $alta->doc_id }} {{ $alta->tipo }}</td>
            <td>{{ $alta->urg->urg }} {{ $alta->urg->d_urg }}</td>
            <td>{{ $alta->estatus }}</td>
        </tr>
    </table>
    {{ Form::label('debito', 'No. Débito') }}
    {{ Form::text('debito', $alta->debito) }}
    
    {{ Form::hidden('id', $alta->id) }}
    
    {{ Form::submit('Aceptar') }}
{{ Form::close() }}
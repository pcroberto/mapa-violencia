<html>
    <body>
        <p>Olá, {{ $radar->user->name }}!</p>
        <p></p>
        <p>Este e-mail tem o objetivo de lhe informar que houve um(a) <b>{{$ocorrencia->crime->descricao}}</b> na região monitorada pelos seu radar <b>{{$radar->nome}}<b></p>
        <p>O fato ocorreu em {{ \Carbon\Carbon::create($ocorrencia->datahora)->format('d/m/Y') }} às {{ \Carbon\Carbon::create($ocorrencia->datahora)->format('H:i') }}.</p>
        <p>O endereço da ocorrência é: {{ $ocorrencia->localizacao->endereco }}</p>
        <p>Fique atento!</p>
        <p></p>
        <p>Att, <br>
        Mapa da Violência.</p>
    </body>
</html>
<html>
    <body>
        <p>Olá {{ $radar->user->nome }}!</p>
        <p></p>
        <p>Este e-mail tem o objetivo de lhe informar que houve um(a) <b>{{$ocorrencia->crime->descricao}}</b> na região monitorada pelos seu radar <b>{{$radar->nome}}<b></p>
        <p>Fique atento!</p>
        <p></p>
        <p>Att, <br>
        Mapa da Violência.</p>
    </body>
</html>
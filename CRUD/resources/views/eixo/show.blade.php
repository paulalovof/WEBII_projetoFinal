<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mais Informações - Eixo</title>
</head>
<body>
    <h1>Mais Informações - Eixo</h1>
    <hr>

    <a href="{{route('eixo.index')}}">Voltar</a>
    <hr>

    <ul>
        <li><b>ID:</b> {{$eixo->id}}</li>
        <li><b>NOME:</b> {{$eixo->nome}}</li>
        <li><b>DESCRICAO:</b> {{$eixo->descricao}}</li>
        <li><b>CRIACAO:</b> {{$eixo->created_at}}</li>
        <li><b>ALTERACAO:</b> {{$eixo->updated_at}}</li>
    </ul>
    
</body>
</html>
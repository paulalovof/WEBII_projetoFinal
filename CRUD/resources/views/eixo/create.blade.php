<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Novo Eixo</title>
</head>
<body>
    <h1>Novo Eixo</h1>
    <hr>

    <a href="{{route('eixo.index')}}">Voltar</a>
    <hr>

    <form action="{{route('eixo.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="nome"><br>
        <textarea name="descricao" id="" cols="15" rows="6"></textarea><br>
        <input type="file" id="documento" name="documento">
        <input type="submit" value="Salvar">
    </form>
</body>
</html>
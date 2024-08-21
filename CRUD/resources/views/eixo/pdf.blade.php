<h1>Relatiorio</h1>
<br><br>
<hr>
<h2>Eixo</h2>

<ul>
    @foreach ($data as $item)
        <li>Nome: {{$item->nome}}</li>
        <li>Descrição: {{$item->descricao}}</li>
        <br>
    @endforeach
</ul>

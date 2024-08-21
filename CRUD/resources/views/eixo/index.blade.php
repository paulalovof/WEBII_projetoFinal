<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tabela de Eixos</title>
</head>
<body>

    <header>
        <nav>
            <ul>
                <li>
                    <a href="{{route('dashboard')}}">Home</a>
                </li>
            </ul>
        </nav>
    </header>

    <h1>Tabela de Eixos</h1>
    <hr>

    @can('create', App\Models\Eixo::class) 
        <a href="{{route('eixo.create')}}">Cadastrar</a>
    @endcan
    <hr>

    <table>
        <thead>
            <th>ID</th>
            <th>NOME</th>
            <th>DESCRIÇÃO</th>
            <th>AÇÕES</th>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->nome}}</td>
                    <td>{{$item->descricao}}</td>
                    <td>
                        <a href="{{asset('storage')."/".$item->url}}" target="_blank">Arquivo</a>
                    </td>
                    <td>
                        @can('show', App\Models\Eixo::class) 
                            <a href="{{route('eixo.show', $item->id)}}">Mais info</a>
                        @endcan

                        @can('edit', App\Models\Eixo::class) 
                            <a href="{{route('eixo.edit', $item->id)}}">Alterar</a>
                        @endcan

                        <a href="{{route('report')}}" target = "_blank">Relatorio</a>
                        <a href="{{route('graph')}}" target = "_blank">Gráfico</a>

                        @can('destroy', App\Models\Eixo::class) 
                        <form method="POST" action="{{route('eixo.destroy', $item->id)}}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Remover"/>
                        </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
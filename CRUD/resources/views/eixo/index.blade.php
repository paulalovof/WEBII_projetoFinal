<x-app-layout >
    <x-slot name="header">
        <div class="flex">
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">   
                Tabela de Eixos
            </h1>

            @can('create', App\Models\Eixo::class)
                <div class="max-w-8xl sm:px-6 lg:px-8">
                    <a href="{{route('eixo.create')}}">
                        <x-primary-button class="ms-3" style="background-color: #88b04b; border: none;" >
                                Cadastrar
                        </x-primary-button>
                    </a>
                </div>
            @endcan
        </div>
        
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col ">
                    <table class="text-black">
                        <thead>
                            <th class="w-[20px] p-2">ID</th>
                            <th class="p-2">NOME</th>
                            <th class="p-2">DESCRIÇÃO</th>
                            <th class="p-2">AÇÕES</th>
                        </thead>

                        <tbody>
                            @foreach ($data as $item)
                                <tr class="">
                                    <td class="w-[50px] text-center p-2">{{$item->id}}</td>
                                    <td class="w-1/4 text-center p-2">{{$item->nome}}</td>
                                    <td class="w-[400px] text-center p-2">{{$item->descricao}}</td>
                                    <td class="flex flex-row justify-around p-2">
                                        <span class="material-symbols-outlined">
                                            <a href="{{asset('storage')."/".$item->url}}" target="_blank">archive</a>
                                        </span>

                                        @can('show', App\Models\Eixo::class) 
                                        <span class="material-symbols-outlined">
                                            <a href="{{route('eixo.show', $item->id)}}">info</a>
                                        </span>
                                        @endcan

                                        @can('edit', App\Models\Eixo::class) 
                                        <span class="material-symbols-outlined">
                                            <a href="{{route('eixo.edit', $item->id)}}">edit</a>
                                        </span>
                                        @endcan

                                        @can('destroy', App\Models\Eixo::class) 
                                            <form method="POST" action="{{route('eixo.destroy', $item->id)}}" class="material-symbols-outlined text-red-500">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" value="Remover">delete</button> 
                                            </form>
                                        @endcan

                                        @can('index', App\Models\Inscricao::class)
                                            @if($item->flag)
                                                <form action="{{route('inscricao.cancel', $item->id)}}" method="post">
                                                    @csrf
                                                        <button type="submit">Cancelar Inscrição</button>
                                                </form>
                                            @else
                                                <form action="{{route('inscricao.index', $item->id)}}" method="post">
                                                    @csrf
                                                    <button type="submit">Inscreva-se</button>
                                                </form> 
                                            @endif
                                            
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
                <hr>
                <div class="text-center">
                    <div class="flex flex-row justify-center p-3">
                        <a href="{{route('report')}}">Relatório Geral</a>
                        <span class="material-symbols-outlined">
                            <a href="{{route('report')}}" target = "_blank">lab_profile</a>
                        </span>
                    </div>
                    
                    <div class="flex flex-row justify-center p-3">
                        @can('graph', App\Models\Eixo::class)
                        <a href="{{route('eixo.graph')}}">Gráfico Inscrições Eixos X Alunos</a>
                            <span class="material-symbols-outlined">
                                <a href="{{route('eixo.graph')}}" target = "_blank">bar_chart</a>
                            </span>
                        @endcan
                    </div>
                </div>
            </div>
                
        </div>
    </div>

    
</x-app-layout>
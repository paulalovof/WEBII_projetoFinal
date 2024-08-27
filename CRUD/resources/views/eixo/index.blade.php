<x-app-layout >
    <x-slot name="header">
        <div class="flex">
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">   
                Tabela de Eixos
            </h1>

            @can('create', App\Models\Eixo::class)
                <div class="max-w-8xl sm:px-6 lg:px-8">
                    <a href="{{route('eixo.create')}}">
                        <x-secondary-button class="ms-3" >
                                Cadastrar
                        </x-secondary-button>
                    </a>
                </div>
            @endcan
        </div>
        
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col">
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

                                        <span class="material-symbols-outlined">
                                            <a href="{{route('report')}}" target = "_blank">lab_profile</a>
                                        </span>

                                        <span class="material-symbols-outlined">
                                            <a href="{{route('graph')}}" target = "_blank">bar_chart</a>
                                        </span>

                                        @can('destroy', App\Models\Eixo::class) 
                                            <form method="POST" action="{{route('eixo.destroy', $item->id)}}" class="material-symbols-outlined text-red-500">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" value="Remover">delete</button> 
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    
</x-app-layout>
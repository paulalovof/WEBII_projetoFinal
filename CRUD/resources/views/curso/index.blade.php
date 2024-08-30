<x-app-layout >
    <x-slot name="header">
        <div class="flex">
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">   
                Tabela de Cursos
            </h1>

            @can('create', App\Models\Curso::class)
                <div class="max-w-8xl sm:px-6 lg:px-8">
                    <a href="{{route('curso.create')}}">
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
                            <th class="p-2">SIGLA</th>
                            <th class="p-2">EIXO</th>
                            <th class="p-2">AÇÕES</th>
                        </thead>

                        <tbody>
                            @foreach ($cursos as $item)
                                <tr class="">
                                    <td class="w-[50px] text-center p-2">{{$item->id}}</td>
                                    <td class="w-1/4 text-center p-2">{{$item->nome}}</td>
                                    <td class="w-[400px] text-center p-2">{{$item->sigla}}</td>
                                    <td class="w-[400px] text-center p-2">{{$item->eixo->nome}}</td>
                                    <td class="flex flex-row justify-around p-2">

                                        @can('show', App\Models\Curso::class) 
                                        <span class="material-symbols-outlined">
                                            <a href="{{route('curso.show', $item->id)}}">info</a>
                                        </span>
                                        @endcan

                                        @can('edit', App\Models\Curso::class) 
                                        <span class="material-symbols-outlined">
                                            <a href="{{route('curso.edit', $item->id)}}">edit</a>
                                        </span>
                                        @endcan

                                        @can('destroy', App\Models\Curso::class) 
                                            <form method="POST" action="{{route('curso.destroy', $item->id)}}" class="material-symbols-outlined text-red-500">
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
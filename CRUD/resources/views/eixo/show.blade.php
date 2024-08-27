<x-app-layout>

    <x-slot name="header">
        <div class="flex">
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">   
                Mais Informações - Eixo
            </h1>

            <div class="max-w-8xl sm:px-6 lg:px-8">
                <a href="{{route('eixo.index')}}">
                    <x-secondary-button class="ms-3" >
                            Voltar
                    </x-secondary-button>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col">
                    <ul>
                        <li class="p-2"><b>ID:</b> {{$eixo->id}}</li>
                        <li class="p-2"><b>NOME:</b> {{$eixo->nome}}</li>
                        <li class="p-2"><b>DESCRICAO:</b> {{$eixo->descricao}}</li>
                        <li class="p-2"><b>CRIACAO:</b> {{$eixo->created_at}}</li>
                        <li class="p-2"><b>ALTERACAO:</b> {{$eixo->updated_at}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
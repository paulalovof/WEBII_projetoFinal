<x-app-layout >
    <x-slot name="header">
        <div class="flex">
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">   
                Inscrição de Eixos
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
                    <p>Você se Inscreveu!</p>
                </div>
            </div>
        </div>
    </div>

    
</x-app-layout>
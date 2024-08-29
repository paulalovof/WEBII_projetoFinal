<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">   
                Novo Eixo
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

    <div class="py-12 text-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col ">
                    <form action="{{route('eixo.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="p-2">
                            <p>Nome:</p>
                            <input type="text" name="nome" class="sm:rounded-lg"><br>
                        </div>
                        
                        <div class="p-2">
                            <p>Descrição:</p>
                            <textarea name="descricao" id="" cols="19" rows="5" class="sm:rounded-lg"></textarea><br>
                        </div>
                        
                        <div class="p-3">
                            <input type="file" id="documento" name="documento"><br>
                        </div>

                        <div>
                            <x-primary-button class="ms-3" style="background-color: #6b5b95; border: none;" type="submit" >
                                Salvar
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
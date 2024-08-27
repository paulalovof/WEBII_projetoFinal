<x-app-layout >
    <x-slot name="header">
        <div class="flex">
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">   
                Editar Eixo
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
                    <form action="{{route('eixo.update', $eixo->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="p-2">
                            <p>Nome:</p>
                            <input type="text" name="nome" class="sm:rounded-lg" value={{$eixo->nome}}><br>
                        </div>

                        <div class="p-2">
                            <p>Descrição:</p>
                            <textarea name="descricao" id="" cols="15" rows="6">{{$eixo->descricao}}</textarea><br>
                        </div> 
                
                        <div>
                            <x-primary-button class="ms-3" type="submit" >
                                Editar
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout >
<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">   
                Novo Curso
            </h1>

            <div class="max-w-8xl sm:px-6 lg:px-8">
                <a href="{{route('curso.index')}}">
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
                    <form action="{{route('curso.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="p-2">
                            <p>Nome:</p>
                            <input type="text" name="nome" class="sm:rounded-lg"><br>
                        </div>
                        
                        <div class="p-2">
                            <p>Sigla:</p>
                            <input type="text" name="sigla" class="sm:rounded-lg"><br>
                        </div>

                        <div class="pt-2">
                            <p>Eixo:</p>
                            <select name="eixo_id" id="eixo_id" class="p-2 sm:rounded-lg" required>
                                <option selected disabled></option>
                                @foreach ($eixos as $item)
                                    <option value="{{$item->id}}">{{$item->nome}}</option>   
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="pt-5">
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
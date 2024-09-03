<x-app-layout >
    <x-slot name="header">
        <div class="flex">
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">   
                Editar Curso
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
                    <form action="{{route('curso.update', $curso->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="p-2">
                            <p>Nome:</p>
                            <input type="text" name="nome" class="sm:rounded-lg" value="{{$curso->nome}}"><br>
                        </div>

                        <div class="p-2">
                            <p>Sigla:</p>
                            <input type="text" name="sigla" class="sm:rounded-lg" value="{{$curso->sigla}}"><br>
                        </div>

                        <div class = "pt-2">

                            <p>Eixo:</p>
                            <select name="eixo_id" id="eixo_id" class="p-2 sm:rounded-lg">
                                @foreach ($eixos as $item)
                                    @if($item->id == $curso->eixo_id)
                                        <option value="{{$item->id}}" selected>{{ $item->nome }}</option>
                                    @else
                                        <option value="{{$item->id}}">{{$item->nome}}</option>  
                                    @endif 
                                @endforeach
                            </select>
                        </div>
                        
                
                        <div class="pt-5">
                            <x-primary-button class="ms-3" style="background-color: #6b5b95; border: none;" type="submit" >
                                Editar
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout >
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl text-center font-bold"> Seja Bem-Vindo! </h1>
                        <br>

                    <fieldset class="border p-2 mb-2 border-indigo-500 rounded">
                        <legend class="px-2 border rounded-md border-indigo-500 text-center">Adicionar um novo livro</legend>

                    <form action="{{route('book.store') }}" method="POST">
                        @csrf

                        <div class="mt-4">
                            <x-input-label for="autor" :value="_('Autor')"/>
                            <x-text-input id="autor" class="block mt-1 w-full" type="text" name="autor" required/>
                            </div>
                            
                            <div class="mt-4">
                                <x-input-label for="titulo" :value="_('Titulo')"/>
                                <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" required/>
                            </div>

                            <div class="mt-4">
                                <x-input-label for="quantidade_paginas" :value="_('Quantidade de Páginas')"/>
                                <x-text-input id="quantidade_paginas" class="block mt-1 w-full" type="number" name="quantidade_paginas" required/>
                            </div>
                            <br>
                            
                            <div class="text-center ">
                            <x-primary-button >Adicionar</x-primary-button>
                            </div>

                            </form>
                        </fieldset>
                            <br>

                            <h2 class="text-2xl text-center font-bold"> Meus Livros </h2>
                            <br>

                            <fieldset class="border p-2 mb-2 border-indigo-500 rounded">
                                <legend class="px-2 border rounded-md border-indigo-500 text-center">Biblioteca</legend>
        
                            @foreach (Auth::user()->myBooks as $book)

                            <div class="flex space-x-4">
                            <div>{{$book->autor}}</div>
                            <div>{{$book->titulo}}</div> 
                            <div>{{$book->quantidade_paginas}}</div> 
                            </div>
                            
                            
                            <form class="my-4" action="{{  route('book.update', $book) }}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                {{-- <div class="flex justify-between shrink"> --}}
                                <x-text-input name="autor" placeholder="Autor" value="{{ $book->autor }}" required> </x-text-input>
                                <x-text-input name="titulo" placeholder="Titulo" value="{{ $book->titulo }}" required> </x-text-input>
                                <x-text-input name="quantidade_paginas" placeholder="Quantidade de Páginas" value="{{ $book->quantidade_paginas }}" required> </x-text-input>
                                {{-- </div>                            --}}
                                <x-primary-button> Editar </x-primary-button>
                            </form>
                            
                            <div>
                                <form action="{{ route('book.destroy', $book) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-danger-button>Apagar Livro</x-danger-button>
                            </form>
                        </div> 
                            @endforeach

                        </fieldset>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

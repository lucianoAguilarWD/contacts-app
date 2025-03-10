@extends('layouts.app')

@section('title', 'Subcategorías')

@section('content')

<x-alt>
    <div class="py-6 mt-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('message'))
            <div class="flex items-center p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
                <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Atención</span>
                <div>
                    <span class="font-medium">{{ session('message') }}</span>
                </div>
            </div>
            @endif
            <div class="bg-white border border-gray-200 shadow-lg rounded-lg overflow-hidden mb-6">
                <!-- Encabezado -->
                <div class="bg-gray-800 p-4">
                    <h1 class="text-3xl font-semibold text-white text-center">
                        Subcategorías de {{$category->name}}
                    </h1>
                    <x-a>
                        <x-slot name="ref">{{Route('admin')}}</x-slot>
                        <x-slot name="color">bg-gray-500 hover:bg-gray-600</x-slot>
                        <x-slot name="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                            </svg>

                        </x-slot>
                    </x-a>
                </div>

                <!-- Contenedor de categorías -->
                <div class="p-6 bg-gray-100">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                        @foreach($category->subcategories as $subcategory)
                        <div class="bg-white border-l-4 border-black shadow-md rounded-lg p-6 hover:shadow-lg transition-shadow">


                            <!-- editar categorias -->

                            <div class="md:col-span-2 space-y-4">
                                <form action="{{ route('admin.subcategorias.editar', $subcategory->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div>
                                        <label class="block text-gray-700">Nombre</label>
                                        <input type="text" name="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" value="{{ old('name', $subcategory->name) }}">
                                        @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                                    </div>
                                    <x-button>
                                        <x-slot name="type">submit</x-slot>
                                        <x-slot name="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>

                                        </x-slot>
                                    </x-button>
                                </form>

                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <form action="{{ route('admin.subcategorias.eliminar', $subcategory->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <x-button>
                                        <x-slot name="type">submit</x-slot>
                                        <x-slot name="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </x-slot>
                                    </x-button>
                                </form>

                            </div>
                        </div>
                        @endforeach
                    </div>

                    <form action="/admin/subcategorias/{{$category->id}}" method="POST">
                        @csrf
                        <div>
                            <label class="block text-gray-700">Nombre</label>
                            <input type="text" name="name" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                            @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                        </div>
                        <x-button>
                            <x-slot name="type">submit</x-slot>
                            <x-slot name="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </x-slot>
                        </x-button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-alt>

@endsection
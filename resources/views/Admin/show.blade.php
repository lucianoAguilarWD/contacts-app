@extends('layouts.admin')

@section('title', 'Registrar Usuario')

@section('content')


<div class="py-6 mt-5">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white border border-gray-200 shadow-lg rounded-lg overflow-hidden mb-6">
            <!-- Encabezado -->
            <div class="bg-gray-800 p-4">
                <h1 class="text-3xl font-semibold text-white text-center">
                    Subcategorías de {{$category->name}}
                </h1>
            </div>

            <!-- Contenedor de categorías -->
            <div class="p-6 bg-gray-100">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($category->subcategories as $category)
                    <div class="bg-white border-l-4 border-black shadow-md rounded-lg p-6 hover:shadow-lg transition-shadow">


                        <!-- editar categorias -->
                        <div class="md:col-span-2 space-y-4">
                            <form action="/admin/editar/{{$category->id}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div>
                                    <label class="block text-gray-700">Nombre</label>
                                    <input type="text" name="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" value="{{ old('name', $category->name) }}">
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
                            <form action="/admin/eliminar/{{$category->id}}" method="POST">
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
                <form action="{{Route('admin.agregar')}}" method="POST">
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


@endsection
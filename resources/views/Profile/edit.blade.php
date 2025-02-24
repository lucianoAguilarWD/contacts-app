@extends('layouts.app')

@section('title', 'Editar Perfil')

@section('content')
<x-main>
    <x-form>
        <x-slot name="title">Editar Perfil</x-slot>
        <x-slot name="url">/profile/update/{{$user->id}} </x-slot>
        <x-slot name="atributos">enctype="multipart/form-data"</x-slot>
        <x-slot name="style">bg-white p-8 rounded-lg shadow-md</x-slot>
        <x-slot name="campos">
            @method('PUT')


            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Nombre -->
                <div>
                    <label for="name" class="block text-gray-700 font-medium mb-1">Nombre</label>
                    <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
                    @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Correo Electrónico -->
                <div>
                    <label for="email" class="block text-gray-700 font-medium mb-1">Correo Electrónico</label>
                    <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}"
                        class="w-full px-4 py-2 border rounded-lg bg-gray-100 cursor-not-allowed" disabled />
                    @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Teléfono -->
                <div>
                    <label for="phone" class="block text-gray-700 font-medium mb-1">Teléfono</label>
                    <input id="phone" type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
                    @error('phone')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- URL -->
                <div>
                    <label for="url" class="block text-gray-700 font-medium mb-1">URL</label>
                    <input id="url" type="text" name="url" value="{{ old('url', $user->url) }}"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
                    @error('url')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Imagen de perfil -->
                <div class="col-span-1">
                    <label for="image" class="block text-gray-700 font-medium mb-1">Imagen de perfil</label>
                    <input id="image" type="file" name="image"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
                    @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Imagen actual (si existe) -->
                @if($user->image)
                <div class="col-span-1 flex flex-col items-center">
                    <p class="text-gray-700 font-medium">Imagen actual:</p>
                    <img src="{{ asset('storage/img/' . $user->image) }}"
                        alt="Imagen de perfil actual"
                        class="w-32 h-32 mt-2 rounded-lg object-cover shadow-md" />
                </div>
                @endif
            </div>

        </x-slot>
        <x-slot name="submit"> Editar </x-slot>
    </x-form>
</x-main>
@endsection
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

                <input type="hidden" name="id" value="{{ $user->id }}">
                <div>
                    <label class="block text-gray-700">Nombre</label>
                    <input type="text" name="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" value="{{ old('name', $user->name) }}">
                    @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-gray-700">Correo Electrónico</label>
                    <input type="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" value="{{ old('email', $user->email) }}" disabled>
                    @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-gray-700">Telefóno</label>
                    <input type="text" name="phone" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" value="{{ old('phone', $user->phone) }}">
                    @error('phone') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-gray-700">URL</label>
                    <input type="text" name="url" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" value="{{ old('url', $user->url) }}">
                    @error('url') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mt-4">
                    <label class="block text-gray-700">Imagen de perfil</label>
                    <input type="file" name="image" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                    @error('image') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                @if($user->image)
                <div class="mt-4">
                    <p>Imagen actual:</p>
                    <img src="{{ asset('storage/img/' . $user->image) }}" class="w-32 h-32 rounded-lg object-cover">
                </div>
                @endif
            </div>


        </x-slot>
        <x-slot name="submit"> Editar </x-slot>
    </x-form>
</x-main>
@endsection
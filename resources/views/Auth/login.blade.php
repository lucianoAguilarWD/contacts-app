@extends('layouts.guest')

@section('title', 'Inicio de Sesión')

@section('content')
<x-main>
    <x-form>
        <x-slot name="title">Iniciar Sesión</x-slot>
        <x-slot name="url">login</x-slot>
        <x-slot name="campos">
            <div>
                <label class="block text-gray-700">Correo Electrónico</label>
                <input type="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-gray-700">Contraseña</label>
                <input type="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>
        </x-slot>
        <x-slot name="submit"> Iniciar Sesión </x-slot>
        <x-slot name="agregados">
            <a href="{{ route('register') }}"
                class="text-blue-600 hover:text-blue-800 underline font-medium">
                Registrarse
            </a>
        </x-slot>

    </x-form>
</x-main>
@endsection
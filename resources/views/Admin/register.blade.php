@extends('layouts.app')

@section('title', 'Registrar Usuario')

@section('content')

<x-main>
    <x-form>
        <x-slot name="title">Registrar Usuario</x-slot>
        <x-slot name="url">{{Route('admin.registrar.store')}}</x-slot>
        <x-slot name="campos">
            <div>
                <label class="block text-gray-700">Nombre</label>
                <input type="text" name="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>
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
            <div>
                <label class="block text-gray-700">Tipo</label>
                <select name="role" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="1">Usuario</option>
                    <option value="0">Administrador</option>
                </select>
            </div>
        </x-slot>
        <x-slot name="submit"> Registrarse </x-slot>
    </x-form>
</x-main>

@endsection
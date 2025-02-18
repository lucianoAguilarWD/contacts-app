@extends('layouts.app')

@section('title', 'Perfil')

@section('content')
<x-main>

    <div class="space-y-6 p-6">

        <div class="bg-white border-l-4 border-black shadow-md rounded-lg p-6 hover:shadow-lg transition-shadow">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center">

                {{-- Imagen de perfil --}}
                @if($user->image)
                <div class="flex flex-col items-center">
                    <img src="{{ asset('storage/img/' . $user->image) }}" class="w-40 h-40 rounded-full object-cover border-2 border-gray-300 shadow-md">
                </div>
                @endif

                {{-- Información personal --}}
                <div class="md:col-span-2 space-y-4">
                    <div>
                        <p class="text-gray-700 text-xl font-semibold">Nombre:</p>
                        <p class="text-lg font-medium text-gray-900">{{ $user->name }}</p>
                    </div>
                    <div>
                        <p class="text-gray-700 text-xl font-semibold">Correo electrónico:</p>
                        <p class="text-lg font-medium text-gray-900">{{ $user->email }}</p>
                    </div>
                    <div>
                        <p class="text-gray-700 text-xl font-semibold">Teléfono:</p>
                        <p class="text-lg font-medium text-gray-900">{{ $user->phone ?? 'No disponible' }}</p>
                    </div>
                    <div>
                        <p class="text-gray-700 text-xl font-semibold">url:</p>
                        <p class="text-lg font-medium text-gray-900">{{ $user->url ?? 'No especificado' }}</p>
                    </div>
                    <form action="/profile/{{$user->id}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                            Borrar Cuenta
                        </button>
                    </form>
                </div>

            </div>
        </div>

    </div>

</x-main>
@endsection
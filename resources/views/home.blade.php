@extends('layouts.app')

@section('title', 'Contacts-app')

@section('content')
<x-alt>
    <div class="max-w-7xl mx-auto px-4 mt-6">
        <div class="bg-white border border-gray-200 shadow-lg rounded-lg overflow-hidden mb-6">
            <!-- Encabezado -->
            <div class="bg-white p-4">
                <h1 class="text-3xl font-semibold text-black text-center">
                    Contactos
                </h1>
            </div>
            @foreach($users as $user)
            <a href="{{Route('profile.show', $user->id)}}">
                <div class="bg-white border border-gray-200 shadow-lg rounded-lg overflow-hidde mb-6 mt-6 mr-6 ml-6">

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6">
                        {{-- Imagen de perfil --}}
                        @if($user->image)
                        <div class="flex flex-col items-center">
                            <img src="{{ asset('storage/img/' . $user->image) }}" class="h-14 w-14">
                        </div>
                        @endif
                        <div class="bg-blancoSuave p-4 rounded-lg border border-gray-300">
                            <p class="text-gray-600 text-lg">Nombre:</p>
                            <p class="font-semibold text-gray-900">
                                {{ $user->name }}
                            </p>
                        </div>
                        <div class="bg-blancoSuave p-4 rounded-lg border border-gray-300">
                            <p class="text-gray-600 text-lg">Email:</p>
                            <p class="font-semibold text-gray-900">
                                {{ $user->email }}
                            </p>
                        </div>
                    </div>

                </div>
            </a>

            @endforeach
            {{ $users->links() }}
        </div>
    </div>
</x-alt>
@endsection
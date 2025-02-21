@extends('layouts.app')

@section('title', 'Perfil')

@section('content')

<x-alt>
    <div class="space-y-6 p-6">

        <div class="bg-white border-l-4 border-black shadow-md rounded-lg p-6 hover:shadow-lg transition-shadow">

            {{-- Imagen de perfil --}}
            @if($user->image)
            <div class="flex flex-col items-center">
                <img src="{{ asset('storage/img/' . $user->image) }}" class="w-60 h-60 rounded-full object-cover border-2 border-gray-300 shadow-md">
            </div>
            @endif

            {{-- Datos de usuario --}}
            <div class="bg-white border border-gray-200 shadow-lg rounded-lg overflow-hidde mb-6 mt-6">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6">
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
                    <div class="bg-blancoSuave p-4 rounded-lg border border-gray-300">
                        <p class="text-gray-600 text-lg">Telefóno:</p>
                        <p class="font-semibold text-gray-900">
                            {{ $user->phone ?? 'Edite su perfil para agregarlo'}}
                        </p>
                    </div>
                    <div class="bg-blancoSuave p-4 rounded-lg border border-gray-300">
                        <p class="text-gray-600 text-lg">URL:</p>
                        @if($user->url)
                        <a href="{{ $user->url }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="text-blue-600 hover:text-blue-800 underline font-medium">
                            {{ $user->url }}
                        </a>
                        @else
                        <p class="font-semibold text-gray-900"> Edite su perfil para agregarlo</p>
                        @endif
                    </div>

                    <div class="bg-blancoSuave p-4 rounded-lg border border-gray-300">
                        <p class="text-gray-600 text-lg">Categorías:</p>

                        @foreach($categories as $category)
                        <p class="font-semibold text-gray-900">
                            {{ $category->name  }}
                        </p>

                        @foreach($category->subcategories as $subcategory)
                        @if(in_array($subcategory->id, $selectedSubcategoryIds))
                        <p class="font-semibold text-gray-600">
                            - {{ $subcategory->name }}
                        </p>
                        @endif
                        @endforeach
                        @endforeach
                        @if(auth()->user()->id == $user->id)
                        <div class="flex items-center justify-end mt-4">

                            <x-a>
                                <x-slot name="ref">{{Route('categories', auth()->user()->id)}}</x-slot>
                                <x-slot name="color">bg-gray-500 hover:bg-gray-600</x-slot>
                                <x-slot name="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </x-slot>
                            </x-a>
                        </div>
                        @endif
                    </div>


                </div>
            </div>
            @if(auth()->user()->id == $user->id)
            <x-a>
                <x-slot name="ref">{{Route('profile.edit')}}</x-slot>
                <x-slot name="color">bg-gray-500 hover:bg-gray-600</x-slot>
                <x-slot name="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>
                </x-slot>
            </x-a>
            @endif
        </div>

    </div>
</x-alt>




@endsection
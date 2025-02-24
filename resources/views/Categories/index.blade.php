@extends('layouts.app')

@section('title', 'Categorías')

@section('content')
<x-main>
    <x-form>
        <x-slot name="title">Categorías</x-slot>
        <x-slot name="url">/categories/{{$user}} </x-slot>
        <x-slot name="style">bg-white p-8 rounded-lg shadow-md w-96</x-slot>
        <x-slot name="campos">
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Categorías -->
                <div>
                    @foreach ($categories as $category)
                    <div class="flex items-center mb-2">
                        <input id="category-{{ $category->id }}" type="checkbox" name="categories[]" value="{{ $category->id }}"
                            class="mr-2 category-checkbox" data-category="{{ $category->id }}">
                        <label for="category-{{ $category->id }}" class="text-gray-700">{{ $category->name }}</label>
                    </div>
                    @endforeach
                </div>
                @if ($errors->any())
                <div class="flex items-center p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
                    <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <div>
                        <span class="font-medium">{{ session('message') }}</span>
                    </div>
                </div>
                @endif
            </div>
        </x-slot>
        <x-slot name="submit">Seleccionar</x-slot>
    </x-form>
</x-main>

@endsection
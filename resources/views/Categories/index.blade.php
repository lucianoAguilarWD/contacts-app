@extends('layouts.app')

@section('title', 'Categorías')

@section('content')
<x-main>
    <x-form>
        <x-slot name="title">Categorías</x-slot>
        <x-slot name="url">/categories </x-slot>
        <x-slot name="style">bg-white p-8 rounded-lg shadow-md</x-slot>
        <x-slot name="campos">
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Categorías (Checkbox) -->
                <div>
                    @foreach ($categories as $category)
                    <div class="flex items-center mb-2">
                        <input id="category-{{ $category->id }}" type="checkbox" name="categories[]" value="{{ $category->id }}"
                            class="mr-2 category-checkbox" data-category="{{ $category->id }}">
                        <label for="category-{{ $category->id }}" class="text-gray-700">{{ $category->name }}</label>
                    </div>
                    @endforeach
                </div>
            </div>
        </x-slot>
        <x-slot name="submit">Seleccionar</x-slot>
    </x-form>
</x-main>

@endsection
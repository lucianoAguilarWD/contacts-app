@extends('layouts.app')

@section('title', 'Categorías')

@section('content')
<x-main>
    <x-form>
        <x-slot name="title">Subcategorías</x-slot>
        <x-slot name="url">/subcategories/{{$user_id}}</x-slot>
        <x-slot name="style">bg-white p-8 rounded-lg shadow-md w-100</x-slot>
        <x-slot name="campos">
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Categorías (Checkbox) -->
                <div>
                    @foreach($categories as $category)
                    <label class="block text-gray-700 font-medium mb-1">{{ $category->name }}</label>

                    @foreach($category->subcategories as $subcategory) {{-- Obtener solo las subcategorías de la categoría actual --}}
                    <div class="flex items-center mb-2">
                        <input type="checkbox" class="form-checkbox h-4 w-4 text-indigo-600" id="subcategory-{{ $subcategory->id }}" name="subcategories[]" value="{{ $subcategory->id }}">
                        <label class="ml-2 text-gray-700" for="subcategory-{{ $subcategory->id }}">{{ $subcategory->name }}</label>
                    </div>
                    @endforeach
                    @endforeach
                </div>
            </div>

        </x-slot>
        <x-slot name="submit">Seleccionar</x-slot>
    </x-form>
</x-main>

@endsection
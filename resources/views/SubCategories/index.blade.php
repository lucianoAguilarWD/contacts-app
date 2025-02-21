@extends('layouts.app')

@section('title', 'Categorías')

@section('content')
<x-main>
    <x-form>
        <x-slot name="title">Categorías</x-slot>
        <x-slot name="url">/categories/charge </x-slot>
        <x-slot name="style">bg-white p-8 rounded-lg shadow-md w-100</x-slot>
        <x-slot name="campos">
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Categorías (Checkbox) -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Subcategorías</label>
                    @foreach ($subcategories as $subcategory)
                    <div class="flex items-center mb-2">
                        jaja
                    </div>
                    @endforeach
                </div>
            </div>

        </x-slot>
        <x-slot name="submit">Seleccionar</x-slot>
    </x-form>
</x-main>

@endsection
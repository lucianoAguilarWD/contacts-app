<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

class CategoryController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:30',
        ]);
        // Crea una nueva categoría y le asigna los valores del request
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('admin')->with('message', 'Categoría creada exitosamente');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:30',
        ]);
        // Busca la categoría por su ID y le actualiza los valores del request
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();

        return redirect()->route('admin')->with('message', 'Categoría actualizada exitosamente');
    }

    public function show(string $id)
    {
        $category = Category::with('subcategories')->findOrFail($id);

        return view('Admin.show', compact('category'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Busca la categoría por su ID y la elimina
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('admin')->with('message', 'Categoría eliminada exitosamente');
    }
}

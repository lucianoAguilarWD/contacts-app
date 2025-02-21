<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        // Obtener las categorías asociadas al usuario
        $categoryIds = $user->categories()->pluck('categories.id');

        // Filtrar las subcategorías que pertenecen a esas categorías
        $subcategories = SubCategory::whereIn('category_id', $categoryIds)->get();

        return view('SubCategories.index', compact('subcategories'));
    }
    /**
     * Display a listing of the resource.
     */
    public function show(string $id)
    {
        $category = Category::with('subcategories')->findOrFail($id);

        return view('Admin.show', compact('category'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:30'],
        ]);

        $subcategory = new SubCategory();
        $subcategory->name = $request->name;
        $subcategory->category_id = $id;
        $subcategory->save();

        return redirect()->route('admin.mostrar', $subcategory->category_id)->with('message', 'Subcategoría creada exitosamente');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:30'],
        ]);

        $subcategory = SubCategory::find($id);
        $subcategory->name = $request->name;
        $subcategory->save();

        return redirect()->route('admin.mostrar', $subcategory->category_id)->with('message', 'Subcategoría actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subcategory = SubCategory::find($id);
        $subcategory->delete();

        return redirect()->route('admin.mostrar', $subcategory->category_id)->with('message', 'Subcategoría eliminada exitosamente');
    }
}

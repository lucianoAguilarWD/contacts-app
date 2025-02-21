<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('Categories.index', compact('categories'));
    }

    public function userSelectedCategories(Request $request)
    {
    
        $user = Auth::user();
        $user_id = $user->id;
        $selected_categories = $request->categories;

        // Elimina las categorías anteriores del usuario
        DB::table('category_user')->where('user_id', $user_id)->delete();

        // Inserta las nuevas categorías
        foreach ($selected_categories as $category_id) {
            DB::table('category_user')->insert([
                'user_id' => $user_id,
                'category_id' => $category_id
            ]);
        }

        return redirect()->route('subcategories')->with('message', 'Categorías seleccionadas actualizadas exitosamente');
    }

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

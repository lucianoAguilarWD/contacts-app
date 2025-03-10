<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Archived_User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        $categories = $user->categories;
        $subcategories = $user->subcategories;
        $selectedSubcategoryIds = $subcategories->pluck('id')->toArray();

        return view('Profile.show', compact('user', 'categories', 'selectedSubcategoryIds'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = Auth::user(); // Obtiene el usuario autenticado
        return view('Profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            "url" => ['nullable', 'url'],
            'phone' => ['nullable', 'string', 'regex:/^\+?[0-9]{7,15}$/'],
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->url = $request->url;
        $user->phone = $request->phone;

        // Si se ha subido una nueva imagen
        if ($request->hasFile('image')) {
            // Eliminar la imagen antigua, si existe
            if ($user->image && Storage::disk('public')->exists('img/' . $user->image)) {
                //Evitar que se borre la imagen por defecto
                if ($user->image !== 'perfil.png') {
                    Storage::disk('public')->delete('img/' . $user->image);
                }
            }

            // Subir la nueva imagen
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); // Generar nombre único para la imagen
            $image->storeAs('img', $imageName, 'public');  // Guardar en storage/app/public/img

            // Actualizar la ruta de la imagen en la base de datos
            $user->image = $imageName;
        }

        $user->save();

        return redirect()->route('profile.show', $user->id)->with('message', 'Perfil actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('admin')->with('error', 'Usuario no encontrado');
        }
    
        $categoriesNames = $user->categories()->pluck('name')->toArray();
        $subCategoriesNames = $user->subcategories()->pluck('name')->toArray();

        $archived = new Archived_User();
        $archived->name = $user->name;
        $archived->email = $user->email;
        $archived->image = $user->image;
        $archived->role = $user->role;
        $archived->url = $user->url;
        $archived->phone = $user->phone;
        $archived->categories = implode('|', $categoriesNames);
        $archived->subcategories = implode('|', $subCategoriesNames);
        $archived->save();

        // Eliminar el usuario de manera lógica
        $user->delete();

        return redirect()->route('admin')->with('message', 'Cuenta eliminada correctamente');
    }
}

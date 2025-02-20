<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('Profile.show', compact('user'));
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
            "image" => ['image'],
            "url" => ['nullable', 'url'],
            "phone" => ['nullable', 'string', 'max:11', 'regex:/^[0-9]+$/'],
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->url = $request->url;
        $user->phone = $request->phone;



        // Si se ha subido una nueva imagen
        if ($request->hasFile('image')) {
            // Eliminar la imagen antigua, si existe
            if ($user->image && Storage::disk('public')->exists('img/' . $user->image)) {
                if($user->image !== 'perfil.png'){
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

        // Guardar los cambios en la base de datos
        $user->save();


        return redirect()->route('profile.show', $user->id)->with('message', 'Perfil actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        // Eliminar la imagen, si existe
        if ($user->image && Storage::disk('public')->exists('img/'. $user->image)) {
            Storage::disk('public')->delete('img/'. $user->image);
        }

        // Eliminar el usuario de la base de datos
        $user->delete();

        return redirect()->route('home')->with('message', 'Cuenta eliminada correctamente');
    }
}

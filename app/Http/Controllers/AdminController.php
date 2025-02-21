<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Paginator::useTailwind();
        $user = Auth::user();
        $users = User::whereNot('id', $user->id)
            ->orderBy('id', 'desc')
            ->paginate(6);

        //categorias         
        $categories = Category::all();

        return view('admin.index', compact('users', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createUser()
    {
        return view('Admin.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeUser(Request $request)
    {
        //Validación de datos
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->whereNull('deleted_at'),
            ],
            'password' => ['required', 'min:6'],
        ]);

        $user = User::withTrashed()->where('email', $request->email)->first();

        if ($user && $user->trashed()) {
            $user->restore();
            // Actualiza los campos si es necesario
            $user->name = $request->name;
            $user->password = Hash::make($request->password);
            $user->role = (int) $request->role;
            $user->phone = NULL;
            $user->url = NULL;
            $user->save();
        } elseif ($user) {
            // Si existe y no está eliminado, lanzar error o manejarlo según la lógica de negocio
            return redirect()->back()->withErrors(['email' => 'El email ya está en uso.']);
        } else {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = (int) $request->role;
            $user->image = 'perfil.png';
            $user->save();
        }

        return redirect()->route('admin')->with('message', 'Usuario creado correctamente');
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('Profile.edit', compact('user'));
    }
}

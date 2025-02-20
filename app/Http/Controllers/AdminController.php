<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:6'],
        ]);

        //Crea un nuevo usuario y le asigna los valores del request
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = (int) $request->role;


        //Guarda el usuario en la base de datos
        $user->save();
        return redirect()->route('admin')->with('message', 'Usuario creado correctamente');
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('Profile.edit', compact('user'));
    }
}

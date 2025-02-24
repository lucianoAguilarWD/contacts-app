<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        //validación de login        
        $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required'],
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        //Si los datos son correctos
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); //prepara la sesión
            return redirect()->route('home')->with('message', 'Login exitoso'); //redirecciona a la página principal
        }

        //Si la contraseña no es correcta, regresa al login con un mensaje de error
        return back()->with('message', 'Email o contraseña incorrectos');
    }

    public function register(Request $request)
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
            $user->phone = NULL;
            $user->url = NULL;
            $user->image = 'perfil.png';
            $user->save();
            // Elimina las subcategorías anteriores del usuario
            DB::table('user_sub_categories')->where('user_id', $user->id)->delete();
            // Elimina las categorías anteriores del usuario
            DB::table('category_user')->where('user_id', $user->id)->delete();
        } elseif ($user) {
            // Si existe y no está eliminado, lanzar error o manejarlo según la lógica de negocio
            return redirect()->back()->withErrors(['email' => 'El email ya está en uso.']);
        } else {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->image = 'perfil.png';
            $user->save();
        }
    
        //Autentica al usuario y redirecciona a la página principal
        Auth::login($user);
        return redirect()->route('home')->with('message', 'Login exitoso');
    }

    public function logout(Request $request)
    {
        //Finaliza la sesión y redirecciona al login
        Auth::logout();

        //Invalida la sesión y genera un nuevo token de sesión para prevenir ataques de cookie theft
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        //Redirecciona al login con un mensaje de despedida
        return redirect()->route('login')->with('message', 'Sesión finalizada');
    }
}

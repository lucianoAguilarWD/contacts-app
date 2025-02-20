<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        Paginator::useTailwind();
        $user = Auth::user();
        $users = User::whereNot('id', $user->id)
                 ->whereNot('role', 0)
                 ->orderBy('id', 'desc')
                 ->paginate(6);
        return view('home', compact('users'));
    }
}

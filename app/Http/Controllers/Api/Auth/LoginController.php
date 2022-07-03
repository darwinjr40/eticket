<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);    
        $user = User::where('email', $request['email'])->first();
        
        if (!$user) {
            return response()->json([
                'message' => 'Correo electronico no encontrado',
            ], 401);
        }

        if (!Hash::check($request['password'], $user->password)) {
            return response([
                'message' => 'Contraseña incorrecta',
            ], 402);
        }
        return $user;

    }
}

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
                'error' => 'Ocurrio un problema',
            ], 401);
        }

        if (!Hash::check($request['password'], $user->password)) {
            return response([
                'message' => 'Contraseña incorrecta',
                'error' => 'Ocurrio un problema'
            ], 402);
        }

        if ($user['rol_id'] != User::EMPLEADO) {
            return response([
                'message' => 'El usuario no es empleado',
                'error' => 'Ocurrio un problema'
            ], 403);
        }
        $token = $user->createToken('Android SDK built for x86')->plainTextToken;
        // $token = $user->createToken('Android SDK built for x86')->accessToken;
        return response([
            'user' => $user,
            'token' => $token,
            'success' => 'Exito'
        ], 201);

    }

    public function eventoDisponible($user_id)
    {
        
        $user = User::find($user_id);
        if ($user) {            
            return response([
                'message' => 'Se encontraron eventos',
                'success' => 'Exito',
                'eventos' => $user->eventosDisponibles(),
            ], 200);
        }
        return response([
            'message' => '!No Existe el Usuario',
            'error' => 'Ocurrio un problema'
        ], 400);
    }

}

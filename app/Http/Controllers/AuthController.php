<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Kanban;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function login(LoginRequest $request)
    {
        $validatedData = $request->validated();

        $succefulLogged = Auth::attempt([
            'email' => $validatedData['email'],
            'password' => $validatedData['password']
        ], true);

        if (!$succefulLogged) {
            return response([
                'success' => false,
                'message' => 'Credeciais invalidas',
            ], 403);
        }
        
        return response([
            'success' => true,
            'message' => 'Login feito com sucesso',
            'data' => Auth::user(),
        ]);
    }

    function register(RegisterRequest $request) 
    {
        $validatedData = $request->validated();

        try {
            $user = User::create($validatedData);

            $kanban = Kanban::create(['user_id' => $user->id]);

            Auth::login($user, true);
            
            return response([
                'success' => true,
                'message' => 'Usuário criado com sucesso',
                'data' => $user
            ]);
        } catch (\Throwable $th) {
            return response([
                'success' => false,
                'message' => 'Erro desconhecido',
            ], 500);
        }
    }

    function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        auth('web')->logout();

        return response([
            'success' => true,
            'message' => 'Deslogado com sucesso',
        ]);
    }

    function me()
    {
        $user = Auth::user();

        if (!$user) {
            return response([
                'success' => false,
                'message' => 'Usuário não está logado',
            ], 401);
        }

        return response([
            'success' => true,
            'message' => 'Usuário está logado',
            'data' => $user
        ]);
    }
}

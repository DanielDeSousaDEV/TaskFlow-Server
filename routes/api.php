<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login' , function () {
    // Exemplo sem validação, só para testar
    $user = User::find(1);

    Auth::login($user); // agora sim gera o cookie da sessão

    $tok = $user->createToken('api_token');

    return response()->json([
        'message' => 'Logged in',
        'user' => $user,
        'token' => $tok->plainTextToken
    ]);
});

Route::get('/check', function () {
    return Auth::check();
});
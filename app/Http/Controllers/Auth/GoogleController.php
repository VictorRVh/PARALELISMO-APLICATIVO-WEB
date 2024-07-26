<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();

            // Separar el nombre y el apellido
            $nameParts = explode(' ', $user->name);
            $lastName = array_splice($nameParts, -2);
            $lastName = implode(' ', $lastName);
    
            // El resto es el primer nombre
            $firstName = implode(' ', $nameParts);

            // Generar un token de correo
            $emailToken = Str::random(60);

            // Verifica si el usuario ya existe en la base de datos
            $findUser = User::where('email', $user->email)->first();

            if ($findUser) {
                // Si el usuario ya existe, inicia sesión
                Auth::login($findUser);
            } else {
                // Si el usuario no existe, crea un nuevo usuario
                $newUser = User::create([
                    'first_name' => $firstName,
                    'last_name' => $lastName,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'avatar' => $user->avatar,
                    'password' => encrypt('my-google'),
                    'email_token' => $emailToken
                ]);

                Auth::login($newUser);
            }

            return redirect('/dashboard');
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Something went wrong or you have rejected the app!');
        }
    }
}

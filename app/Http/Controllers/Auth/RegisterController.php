<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'regex:/^[A-Za-z0-9_]+$/', 'unique:users,username'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'confirmed', Password::min(12)->mixedCase()->numbers()->symbols()],
            'role' => ['required', 'in:designer,fabricator'],
            'terms_agree' => ['accepted'],
        ], [
            'name.required' => 'El nombre completo es obligatorio.',
            'name.string' => 'El nombre debe ser texto válido.',
            'name.max' => 'El nombre no puede superar los 255 caracteres.',
            'username.required' => 'El nombre de usuario es obligatorio.',
            'username.string' => 'El nombre de usuario debe ser texto válido.',
            'username.max' => 'El nombre de usuario no puede superar los 255 caracteres.',
            'username.regex' => 'El usuario solo puede contener letras, números y guion bajo.',
            'username.unique' => 'Este nombre de usuario ya está registrado.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.string' => 'El correo electrónico debe ser texto válido.',
            'email.email' => 'Ingresa un correo electrónico válido.',
            'email.max' => 'El correo electrónico no puede superar los 255 caracteres.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
            'password.required' => 'La clave es obligatoria.',
            'password.string' => 'La clave debe ser texto válido.',
            'password.confirmed' => 'La confirmación de la clave no coincide.',
            'password.min' => 'La clave debe tener al menos 12 caracteres.',
            'password.mixed' => 'La clave debe incluir letras mayúsculas y minúsculas.',
            'password.numbers' => 'La clave debe incluir al menos un número.',
            'password.symbols' => 'La clave debe incluir al menos un símbolo.',
            'role.required' => 'Selecciona un perfil de ingeniería.',
            'role.in' => 'El perfil seleccionado no es válido.',
            'terms_agree.accepted' => 'Debes aceptar las licencias y condiciones para continuar.',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'role' => $validated['role'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => [
                'required',
                'string',
                'max:255',
                'regex:/^[A-Za-z0-9_]+$/',
                Rule::unique('users', 'username')->ignore($user->getKey()),
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->getKey()),
            ],
            'role' => ['required', Rule::in(['designer', 'fabricator'])],
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
            'role.required' => 'Selecciona un perfil de ingeniería.',
            'role.in' => 'El perfil seleccionado no es válido.',
        ]);

        $user->fill($validated)->save();

        return redirect()->route('profile.edit')->with('profile-status', 'Los datos del perfil se guardaron correctamente.');
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => [
                'required',
                'string',
                'confirmed',
                Password::min(12)->mixedCase()->numbers()->symbols(),
            ],
        ], [
            'current_password.required' => 'La clave actual es obligatoria.',
            'current_password.current_password' => 'La clave actual no es correcta.',
            'password.required' => 'La nueva clave es obligatoria.',
            'password.string' => 'La nueva clave debe ser texto válido.',
            'password.confirmed' => 'La confirmación de la nueva clave no coincide.',
            'password.min' => 'La nueva clave debe tener al menos 12 caracteres.',
            'password.mixed' => 'La nueva clave debe incluir letras mayúsculas y minúsculas.',
            'password.numbers' => 'La nueva clave debe incluir al menos un número.',
            'password.symbols' => 'La nueva clave debe incluir al menos un símbolo.',
        ]);

        $request->user()->forceFill([
            'password' => Hash::make($validated['password']),
        ])->save();

        return redirect()->route('profile.edit')->with('password-status', 'La clave se actualizó correctamente.');
    }
}

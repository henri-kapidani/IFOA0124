<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): Response
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'profile_img' => ['nullable', 'image', 'max:1024'], // size in kilobytes
        ]);

        // salvare l'immagine
        // $file_path = Storage::disk('local')->put('', $request['profile_img']); // usa lo storage specificato
        $file_path = $request['profile_img'] ? Storage::put('/profiles', $request['profile_img']) : null; // usa lo storage di default

        // mettere nel db il percorso dell'immagine
        $user = User::create([
            /*
            'nome_colonna_nel_db' => $request->nome_input_nel_form
            */
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->string('password')),
            'role' => 'student',
            'profile_img' => 'storage/' . $file_path,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return response()->noContent();
    }
}

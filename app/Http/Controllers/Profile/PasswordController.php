<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;


use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
        
    }    

    public function update(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string', 'max:255'],
            'password' => [
                'required','string','confirmed','max:255',
                Password::min(6)->mixedCase()->numbers()->symbols(),
            ],
        ]);

        $user = $request->user();

        //Se debe verificar si la contraseña coincide con la del usuario
        if(!$this->checkPassword($request->input('current_password'), $user->password)){
            throw ValidationException::withMessages([
                'current_password' => 'Is not your current password. Remember that you already updated it'
            ]);
        }

        $user->password = Hash::make($request->password);
        $user->save();
        return with(
            ['msg' => 'password_updated']);   
    }


    public function checkPassword(string $current_password, string $user_password): bool
    {
        return Hash::check($current_password, $user_password);

    }
}

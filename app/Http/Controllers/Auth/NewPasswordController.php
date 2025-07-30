<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function create(Request $request): View
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Add custom validation rules for sequential characters and dictionary words
        \Illuminate\Support\Facades\Validator::extend('no_sequential', function ($attribute, $value, $parameters, $validator) {
            // Check for sequences of 4 or more characters (ascending or descending)
            for ($i = 0; $i < strlen($value) - 3; $i++) {
                // Check ascending sequence
                if (
                    ord($value[$i]) + 1 === ord($value[$i+1]) &&
                    ord($value[$i+1]) + 1 === ord($value[$i+2]) &&
                    ord($value[$i+2]) + 1 === ord($value[$i+3])
                ) {
                    return false;
                }
                
                // Check descending sequence
                if (
                    ord($value[$i]) - 1 === ord($value[$i+1]) &&
                    ord($value[$i+1]) - 1 === ord($value[$i+2]) &&
                    ord($value[$i+2]) - 1 === ord($value[$i+3])
                ) {
                    return false;
                }
            }
            return true;
        }, 'The :attribute contains sequential characters (e.g., 1234, abcd).');
        
        \Illuminate\Support\Facades\Validator::extend('no_dictionary_words', function ($attribute, $value, $parameters, $validator) {
            $commonWords = ['password', 'love', 'admin', 'welcome', 'qwerty', 'abc', 'secret', 'letmein'];
            $lowercase = strtolower($value);
            
            foreach ($commonWords as $word) {
                if (strpos($lowercase, $word) !== false) {
                    return false;
                }
            }
            return true;
        }, 'The :attribute contains common dictionary words.');

        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => [
                'required', 
                'confirmed',
                'min:8',                  // Minimum 8 characters
                'max:64',                 // Maximum 64 characters
                'regex:/[a-z]/',         // At least one lowercase letter
                'regex:/[A-Z]/',         // At least one uppercase letter
                'regex:/[0-9]/',         // At least one number
                'regex:/[@$!%*#?&]/',    // At least one special character
                'no_sequential',          // No sequential characters (e.g., 1234, abcd)
                'no_dictionary_words',    // No common dictionary words
            ],
        ]);

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withInput($request->only('email'))
                        ->withErrors(['email' => __($status)]);
    }
}

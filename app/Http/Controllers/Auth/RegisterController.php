<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Notifications\UserRegistered;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/register/finished';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
            'last_name'  => 'required|string|max:191',
            'first_name' => 'required|string|max:191',
            'email'      => 'required|string|email|max:191|unique:users',
            'password'   => 'required|string|min:6|confirmed',
            'school'     => 'nullable|string|max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data) {
        $user = User::create([
            'last_name'       => $data['last_name'],
            'first_name'      => $data['first_name'],
            'email'           => $data['email'],
            'password'        => Hash::make($data['password']),
            'confirmed_token' => str_random(60),
            'school'          => $data['school'],
        ]);

        return $user;
    }

    public function register(Request $request) {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return $this->registered($request, $user) ?: redirect($this->redirectPath());
    }

    /**
     * @param Request $request
     * @param User    $user
     */
    protected function registered(Request $request, $user) {
        $this->notifyUserRegistered($user);
    }

    /**
     * Page de finalisation d'incription
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function finished() {
        return view('auth.finished');
    }

    /**
     * Notifie l'utilisateur de la création de son compte
     *
     * @param User $user
     */
    private function notifyUserRegistered($user) {
        $user->notify(new UserRegistered());
    }

    /**
     * Notify again the user (account confirmation)
     *
     * @param $user_email Email of the user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function notifyAgain($user_email) {
        $user = User::where('email', $user_email);

        //Errors
        if (!$user) {
            abort('400', 'Bad request');
        }
        if ($user->confirmed) {
            return redirect()->back();
        }

        $this->notifyUserRegistered($user);

        return redirect()->back();
    }

    public function confirm($email, $token) {
        if (!$email || !$token) {
            abort('400', 'Bad request');
        }

        $user = User::whereConfirmedToken($email, $token)->first();

        if ($user === null) {
            abort('400', 'Bad request');
        }

        $user->confirmed = 1;
        $user->confirmed_token = null;
        $user->save();

        session()->flash('success', 'Votre compte est maintenant validé ! A bientôt pour le lancement.');
        return redirect()->route('home');
    }
}

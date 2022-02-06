<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;
use Exception;
use File;
use Str;

class LoginController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
      $this->middleware('guest')->except('logout');
    }

    public function redirectToGoogleProvider() {
      return Socialite::driver('google')->redirect();
    }

    public function handleGoogleProviderCallback() {
      try {
        $googleUser = Socialite::driver('google')->user();
        $authUser = $this->findOrCreateUser($googleUser);
        Auth::login($authUser, true);
      } catch (Exception $e) {
        return back()->withErrors(['error' => 'There was an error logging you in with Google']);
      }

      return redirect('home');
    }

    public function findOrCreateUser ($socialUser) {
        if ($authUser = User::where('external_id', $socialUser->id)->first()) {
          return $authUser;
        }

        return User::create([
          'external_id' => $socialUser->id,
          'username' => $socialUser->email,
          'email' => $socialUser->email,
          'name' => $socialUser->name,
          'avatar' => $socialUser->avatar
        ]);
      }
}

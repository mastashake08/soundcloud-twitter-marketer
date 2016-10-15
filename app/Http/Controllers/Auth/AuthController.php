<?php

namespace App\Http\Controllers\Auth;

use Socialite;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{

	 use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    public function __construct()
    {
        $this->redirectPath = route('home');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    public function redirectToTwitterProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('soundcloud')->user();

        // $user->token;
	$data = [
            'name' => $user->getName(),
            'email' => $user->getEmail()
        ];
     
        Auth::login(User::firstOrCreate($data));
	//after login redirecting to home page
        return redirect($this->redirectPath());
    }

    public function handleTwitterProviderCallback()
    {
        $user = Socialite::driver('twitter')->user();

        // $user->token;
	$data = [
            'name' => $user->getName(),
            'email' => $user->getEmail()
        ];
     
        Auth::login(User::firstOrCreate($data));
	//after login redirecting to home page
        return redirect($this->redirectPath());
    }
}

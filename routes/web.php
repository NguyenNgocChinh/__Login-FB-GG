<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/auth/google/callback', function () {
    try {
        $user = Socialite::driver('google')->stateless()->user();
    } catch (Exception $e) {
        return redirect('/login');
    }

    $name = $user->getName();
    $id = $user->getId();
    $email = $user->getEmail();
    $avatar = $user->getAvatar();

    $existingUser = User::where('email', $email)->first();

    if ($existingUser)
        auth()->login($existingUser, true);
    else {
        $newUser = new User();
        $newUser->name = $name;
        $newUser->email = $email;
        $newUser->avatar_origin = $avatar;
        $newUser->google_id = $id;
        $newUser->save();
        auth()->login($newUser, true);

    }
    return redirect()->to('/profile');
});

Route::get('/logout', function (Request $request){
    \Illuminate\Support\Facades\Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
});

/*FACEBOOK*/
Route::get('/auth/facebook', function () {
    return Socialite::driver('facebook')->redirect();
});

Route::get('/auth/facebook/callback', function () {
    try {
        $user = Socialite::driver('facebook')->stateless()->user();
    } catch (Exception $e) {
        return redirect('/login');
    }

    $name = $user->getName();
    $id = $user->getId();
    $email = $user->getEmail();
    $avatar = $user->getAvatar();

    $existingUser = User::where('email', $email)->first();

    if ($existingUser)
        auth()->login($existingUser, true);
    else {
        $newUser = new User();
        $newUser->name = $name;
        $newUser->email = $email;
        $newUser->avatar_origin = $avatar;
        $newUser->google_id = $id;
        $newUser->save();
        auth()->login($newUser, true);

    }
    return redirect()->to('/profile');
});

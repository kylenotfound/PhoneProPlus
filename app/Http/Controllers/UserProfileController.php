<?php

namespace App\Http\Controllers;

use App\Requests\UpdateUserProfileRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;
use Hash;

class UserProfileController extends Controller {

  public function index(User $user) {
    if($user->profile_id == null) {
      $user->generateProfile();
    }
    return view('profile', ['user' => $user]);
  }

  public function update(UpdateUserProfileRequest $request, User $user) {
    $user->update([
      'name' => $request->input('name') ?? $user->getName(),
      'username' => $request->input('username') ?? $user->getUsername(),
      'email' => $request->input('username') ?? $user->getEmail(),
      'password' => Hash::make($request->input('password'))
    ]);
    return back()->with(['success' => 'Profile Updated!']);
  }
}

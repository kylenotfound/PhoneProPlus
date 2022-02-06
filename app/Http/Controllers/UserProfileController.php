<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserProfileRequest;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UserProfile;

class UserProfileController extends Controller {

  public function index(User $user) {
    if($user->profile_id == null) {
      $user->generateProfile();
    }
    return view('profile', ['user' => $user]);
  }

  public function update(UpdateUserProfileRequest $request, User $user) {
    $user->update($request->validated());
    return back()->with(['success' => 'Profile Updated!']);
  }
}

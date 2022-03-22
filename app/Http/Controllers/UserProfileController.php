<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserProfileRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\Record;
use App\Models\Save;
use App\Models\VisibilityType;
use Hash;

class UserProfileController extends Controller {

  public function index(User $user) {

    $records = Record::where('user_id', $user->getId())->paginate(10);

    $publicRecords = Record::where('user_id', $user->getId())
      ->where('is_private', '=', VisibilityType::PUBLIC_RECORD)
      ->get();

    $saves = Save::where('user_id', $user->getId())->get();

    if($user->profile_id == null) {
      $user->generateProfile();
    }

    return view('profile', [
      'user' => $user,
      'records' => $records,
      'saves' => $saves,
      'publicRecords' => $publicRecords
    ]);
  }

  public function update(UpdateUserProfileRequest $request, User $user) {
    $user->update([
      'name' => $request->input('name') ?? $user->getName(),
      'username' => $request->input('username') ?? $user->getUsername(),
      'email' => $request->input('email') ?? $user->getEmail(),
      'password' => Hash::make($request->input('password'))
    ]);
    return back()->with(['success' => 'Profile Updated!']);
  }
}

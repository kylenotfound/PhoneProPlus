<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserProfileRequest extends FormRequest {

  public function authorize() {
    return true;
  }

  public function rules() {
    return [
      'username' => [
        Rule::unique('users', 'username')->ignore(auth()->user()->username),
        'max:16|min:3'
      ],
      'email' => [
        Rule::unique('users', 'email')->ignore(auth()->user()->email)
      ],
      'name' => 'string|max:32',
      'password' => 'string|min:8|'
    ];
  }
}

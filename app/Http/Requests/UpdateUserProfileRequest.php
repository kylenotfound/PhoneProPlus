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
        Rule::unique('users', 'username')->ignore(auth()->user()->getUsername()),
        'max:16|min:3'
      ],
      'email' => [
        Rule::unique('users', 'email')->ignore(auth()->user()->getEmail())
      ],
      'password' => 'string|min:8|',
      'name' => 'nullable|string|min:2|max:32'
    ];
  }
}

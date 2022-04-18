<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PhoneNumber;

class CreateRecordRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
      return [
        'user_id' => 'required|integer',
        'building_name' => 'required|string|max:48|min:3',
        'address' => 'required|string|max:60|min:8',
        'city' => 'required|string|max:32|min:4',
        'state' => 'required|string|max:2|min:2',
        'zipcode' => 'required|string|max:5|min:5',
        'phone_number' => new PhoneNumber(),
        'building_type_id' => 'required',
        'is_private' => 'required',
        'notes' => 'nullable|max:256',
      ];
    }
}

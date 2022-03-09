<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
      return [
        'record_id' => 'required',
        'user_id' => 'required'
      ];
    }
}

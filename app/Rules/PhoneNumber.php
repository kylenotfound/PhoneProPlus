<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PhoneNumber implements Rule {

    private $pattern;

    public function __construct() {
      $this->pattern = "/^\(\d{3}\)\s\d{3}-\d{4}/";
    }

    public function passes($attribute, $value) {
      return preg_match($this->pattern, $value) === 1;
    }

    public function message() {
      return 'Your phone number must match the following format: (XXX) XXX-XXXX.';
    }
}

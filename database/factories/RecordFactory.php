<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Rules\PhoneNumber;
use App\Models\User;

class RecordFactory extends Factory {

  public function definition() {
    return [
      'user_id' => User::factory()->create()->id,
      'building_name' => $this->faker->company,
      'address' => $this->faker->streetAddress,
      'city' => $this->faker->city,
      'state' => $this->faker->stateAbbr,
      'zipcode' => $this->zipCode(),
      'phone_number' =>  $this->phoneNumber(),
      'is_private' => 1,
      'building_type_id' => 2
    ];
  }

  //yucky gross but $faker doesnt match the accepted Rule for phone formats!
  private function phoneNumber() {
    $number = '(';
    for ($i = 1; $i < 9; $i++) {
      $r = strval(rand(0 , 9));

      if ($i == 3) {
        $number .= $r;
        $number .= ') ';
      }

      if ($i == 5) {
        $number .= $r;
        $number .= '-';
      }

      $number .= $r;
    }
    return $number;
  }

  private function zipCode() {
    $zipcode = '';
    for ($i = 0; $i < 5; $i++) {
      $zipcode .= strval(rand(0, 9));
    }
    return $zipcode;
  }

}

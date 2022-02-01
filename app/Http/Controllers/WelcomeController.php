<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisibilityType;
use App\Models\Record;

class WelcomeController extends Controller {

  public function index() {
    $records = Record::where('is_private', VisibilityType::PUBLIC_RECORD)->paginate(10);
    return view('welcome', [
      'records' => $records
    ]);
  }

}

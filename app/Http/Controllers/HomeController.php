<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BuildingType;
use App\Models\Record;
use App\Models\Save;

class HomeController extends Controller {

  public function index() {
    $records = Record::where('user_id', auth()->id())
      ->paginate(10);
    $saves = Save::where('user_id', auth()->id())
      ->whereNull('deleted_at')
      ->paginate(10);
    
    return view('home', [
      'records' => $records,
      'saves' => $saves
    ]);
  }
}

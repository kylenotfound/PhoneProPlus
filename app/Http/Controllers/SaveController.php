<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveRequest;
use App\Models\Save;
use Illuminate\Http\Request;

class SaveController extends Controller {
    
  public function save(SaveRequest $request) {
    $save = Save::where('record_id', $request->input('record_id'))
      ->where('user_id', auth()->id())
      ->withTrashed()
      ->first();
     
    if ($save != null) {
      $save->restore();
      return back()->with(['success' => 'Record saved to your profile!']); 
    }

    Save::create($request->validated());
    return back()->with(['success' => 'Record saved to your profile!']);
  }  

  public function unsave(Request $request) {
    $save = Save::where('record_id', $request->input('record_id'))
      ->where('user_id', auth()->id())
      ->first();
    
    if ($save == null) {
      abort(500);
    }

    $save->delete();
    return back()->with(['success' => 'Record unsaved!']);
  }

  public function unsaveall(Request $request) {
    $saves = Save::where('user_id', auth()->id())->get();
    foreach($saves as $save) {
      $save->delete();
    }

    return redirect()->route('home')->with(['success' => 'All of your saved records have been removed']);
  }

}

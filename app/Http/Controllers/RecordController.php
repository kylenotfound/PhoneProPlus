<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRecordRequest;
use Illuminate\Http\Request;

use App\Models\BuildingType;
use App\Models\VisibilityType;
use App\Models\Record;
use App\Rules\PhoneNumber;

class RecordController extends Controller {

  public function index(Record $record) {
    return view('records.index', ['record' => $record]);
  }

  public function create() {
    return view('records.create');
  }

  public function store(CreateRecordRequest $request) {
    $record = Record::create($request->all());
    return redirect('home')->with(['success' => 'New record succesfully added!']);
  }

  public function edit(Request $request, Record $record) {

    $request->validate([
      'building_name' => 'nullable|string|max:24|min:3',
      'address' => 'nullable|string|max:60|min:8',
      'city' => 'nullable|string|max:32|min:4',
      'state' => 'nullable|string|max:2|min:2',
      'phone_number' => [new PhoneNumber, 'nullable'],
      'zipcode' => 'nullable|max:5|min:5',
      'notes' => 'nullable|max:256',
    ]);

    Record::where('id', $record->getId())
      ->update([
        'building_name' => $request->input('building_name') ?? $record->getBuildingName(),
        'address' => $request->input('address') ?? $record->getAddress(),
        'city' => $request->input('city') ?? $record->getCity(),
        'state' => $request->input('state') ?? $record->getState(),
        'phone_number' => $request->input('phone_number') ?? $record->getPhoneNumber(),
        'zipcode' => $request->input('zipcode') ?? $record->getZipcode(),
        'is_private' => $request->input('is_private') ?? $record->isPrivate(),
        'building_type_id' => $request->input('building_type_id') ?? $record->buildingType->id,
        'notes' => $request->input('notes'),
      ]);

    return back()->with(['success' => 'Record Updated!']);
  }

  public function delete(Record $record) {
    $record->delete();
    return redirect('home')->with(['success' => 'Record Deleted!']);
  }

  public function deleteAll() {
    $records = Record::where('user_id', auth()->id())->get();

    if (count($records) === 0) {
      return back()->withErrors(['errors' => 'No Records!']);
    }

    foreach ($records as $record) {
      $record->delete();
    }

    return redirect()->route('home')->with(['success' => 'All of your records have been deleted!']);
  }

  public function deleteAllPublic() {
    $records = Record::where('user_id', auth()->id())
      ->where('is_private', '=', VisibilityType::PUBLIC_RECORD)
      ->get();

    if (count($records) === 0) {
      return back()->withErrors(['errors' => 'No Records!']);
    }

    foreach($records as $record) {
      $record->delete();
    }  

    return redirect()->route('home')->with(['success' => 'All of your PUBLIC records have been deleted!']);
  }

  public function deleteAllPrivate() {
    $records = Record::where('user_id', auth()->id())
      ->where('is_private', '=', VisibilityType::PRIVATE_RECORD)
      ->get();

    if (count($records) === 0) {
      return back()->withErrors(['errorss' => 'No Records!']);
    }  
    
    foreach($records as $record) {
      $record->delete();
    }  

    return redirect()->route('home')->with(['success' => 'All of your PRIVATE records have been deleted!']);
  }
}

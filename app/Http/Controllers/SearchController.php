<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BuildingType;
use App\Models\Record;

class SearchController extends Controller {

  public function search(Request $request) {
    $filters = $request->all();
    $records = Record::query();

    if (isset($filters['building_name']) && $filters['building_name'] != '') {
      $records->where('records.building_name', 'LIKE', "%{$filters['building_name']}%");
    }

    if (isset($filters['address']) && $filters['address'] != '') {
      $records->where('records.address', 'LIKE', "%{$filters['address']}%");
    }

    if (isset($filters['city']) && $filters['city'] != '') {
      $records->where('records.city', 'LIKE', "%{$filters['city']}%");
    }

    if (isset($filters['state']) && $filters['state'] != '') {
      $records->where('records.state', 'LIKE', "%{$filters['state']}%");
    }

    if (isset($filters['zipcode']) && $filters['zipcode'] != '') {
      $records->where('records.zipcode', 'LIKE', "%{$filters['zipcode']}%");
    }

    if (isset($filters['phone_number']) && $filters['phone_number'] != '') {
      $records->where('records.phone_number', 'LIKE', "%{$filters['phone_number']}%");
    }

    if (isset($filters['building_type_id']) && $filters['building_type_id'] != '') {
      $records->where('records.building_type_id', 'LIKE', "%{$filters['building_type_id']}%");
    }

    /**
     * Handle Pagination Buttons
     */

    if ($request->filled('first-page-button')) {
      $filteredRecords = $records->paginate(10, ['*'], 'page', 1);
    }

    if ($request->filled('last-page-button')) {
      $pageNumber = $request->input('total-page-numbers');
      $filteredRecords = $records->paginate(10, ['*'], 'page', $pageNumber);
    }

    if ($request->filled('forward-page-button')) {
      $pageNumber = $request->input('page-number');
      $filteredRecords = $records->paginate(10, ['*'], 'page', $pageNumber + 1);
    }

    //if the back button is clicked
    if ($request->filled('back-page-button')) {
      $pageNumber = $request->input('page-number');
      $filteredRecords = $records->paginate(10, ['*'], 'page', $pageNumber - 1);
    }

    $returnRecords = $filteredRecords ?? $records->paginate(10);

    if (count($returnRecords) === 0) {
      return redirect()->route('welcome')->withErrors(['errors' => 'No results found with the search parameters provided!']);
    }

    return view('welcome', [
      'records' => $returnRecords,
      'buildingTypes' => BuildingType::all()
    ]);

  }

}

<select id="inputBuildingType" name="building_type_id" class="form-control">
    <option selected="selected" disabled>Choose...</option>
    @foreach ($buildingTypes as $type)
        <option value="{{ $type->getId() }}">{{ $type->getName() }}</option>
    @endforeach
</select>

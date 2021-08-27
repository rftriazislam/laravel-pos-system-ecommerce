@foreach ($raw_material_type_attributes as $attribute)
	@if (Helper::is_dropdown($attribute))
		<div class="row mb-1">
			<label for="{{ $attribute }}" class="col-sm-2 col-form-label">{{ ucfirst($attribute) }}</label>
			<div class="col-sm-10">
                <select class="select2 form-select {{ $attribute }}" name="{{ $attribute }}" id="{{ $attribute }}" data-live-search="true">
                    <option value="">Select {{ ucfirst($attribute) }}</option>
                    @foreach (Helper::get_dropdown_list($attribute) as $dropdown_item)
                    	<option value="{{ $dropdown_item }}">{{ $dropdown_item }}</option>
                    @endforeach
                </select>
			</div>
		</div>
	@else
		<div class="row mb-1">
			<label for="{{ $attribute }}" class="col-sm-2 col-form-label">{{ ucfirst($attribute) }}</label>
			<div class="col-sm-10">
				<input type="text" class="form-control {{ $attribute }}" id="{{ $attribute }}" name="{{ $attribute }}" placeholder="{{ ucfirst($attribute) }}" value="">	
			</div>
		</div>
	@endif
@endforeach
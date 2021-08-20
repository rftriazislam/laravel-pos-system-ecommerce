@extends('backend.layouts.app')

@section('content')

<div class="col-lg-8 mx-auto">
    <div class="card">
        <div class="card-body p-0">
        
          <form class="p-4" action="{{ route('attributes.update', $attribute->id) }}" method="POST">
              <input name="_method" type="hidden" value="PATCH">
              <input type="hidden" name="lang" value="{{ $lang }}">
              @csrf
              <div class="form-group row">
                  <label class="col-sm-3 col-from-label" for="name">{{ translate('Name')}}
                     {{-- <i class="las la-language text-danger" title="{{translate('Translatable')}}"></i> --}}
                    </label>
                  <div class="col-sm-9">
                      <input type="text" placeholder="{{ translate('Name')}}" id="name" name="name" class="form-control" required value="{{ $attribute->getTranslation('name', $lang) }}">
                  </div>
              </div>
              <div class="form-group mb-0 d-flex justify-content-end">
                  <button type="submit" class="btn btn-primary">{{translate('Save')}}</button>
              </div>
            </form>
        </div>
    </div>
</div>

@endsection

<div class="modal-header bord-btm">
    <h4 class="modal-title h6">{{ translate('Select variation') }} - {{ $stocks->first()->product->getTranslation('name') }}</h4>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="row gutters-5">
        @foreach ($stocks as $key => $stock)
            <div class="col-lg-3 col-sm-6">
                <label class="aiz-megabox d-block">
                    <input id="aiz-pos-varient-input" class="form-check-input me-1" type="radio" name="variant" value="{{ $stock->variant }}" @if ($stock->qty <= 0)
                        disabled
                    @endif>
                    <span class="d-flex flex-sm-row p-2 text-end border-secondary pad-all card aiz-megabox-elem">
                        <span class="flex-grow-1 pad-lft pl-2">
                            <span class="d-block strong-600">{{ $stock->variant }}</span>
                            <span class="d-block">Price: {{ single_price($stock->price) }}</span>
                            <span class="badge badge-inline @if ($stock->qty <= 0)
                                badge-secondary
                            @else
                            bg-success
                            @endif">Stock: {{ $stock->qty }}</span>
                        </span>
                    </span>
                </label>
            </div>
        @endforeach
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-styled btn-base-3" data-bs-dismiss="modal">Close</button>
    <button type="button" onclick="addVariantProductToCart({{ $stocks->first()->product->id }})" class="btn btn-primary btn-styled btn-base-1">Add Product</button>
</div>

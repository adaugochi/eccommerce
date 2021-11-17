<div class="row">
    <div class="col-md-8">
        <div class="card card-padding">
            <div class="card__header clearfix">
                <span class="card__title">Product Information</span>
            </div>
            <div class="card__body">
                <div class="row pb-3">
                    <div class="col-md-6">
                        <label class="font-weight-bold tx-dark">Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                               value="{{ $isEdit ? $product->title : old('title') }}">
                        @include('elements.error', ['fieldName' => 'title'])
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold tx-dark">Currency</label>
                        <select class="form-control tx-12 text_field @error('currency') is-invalid @enderror"
                                data-placeholder="Please choose one" name="currency" >
                            <option label="Please choose one"></option>
                            @php $cur = $isEdit ? $product->currency : old('currency'); @endphp
                            @foreach($currencies as $currency)
                                <option value="{{ $currency->symbol }}"
                                    {{ $cur  == $currency->symbol ? 'selected="selected"' : '' }}>
                                    {{ $currency->name }}
                                </option>
                            @endforeach
                        </select>
                        @include('elements.error', ['fieldName' => 'currency'])
                    </div>
                </div>

                <div class="row pb-3">
                    <div class="col-md-6">
                        <label class="font-weight-bold tx-dark">Amount</label>
                        <input type="number" name="amount" class="form-control @error('amount') is-invalid @enderror"
                               value="{{ $isEdit ? $product->amount : old('amount') }}">
                        @include('elements.error', ['fieldName' => 'amount'])
                    </div>
                    <div class="col-md-6">
                        <label class="font-weight-bold tx-dark">Quantity</label>
                        <input type="number" value="{{ $isEdit ? $product->quantity : old('quantity') }}" name="quantity"
                               class="form-control @error('quantity') is-invalid @enderror">
                        @include('elements.error', ['fieldName' => 'quantity'])
                    </div>
                </div>

                <div class="row pb-4">
                    <div class="col-12">
                        <label class="font-weight-bold tx-dark">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                                  rows="5" name="description">{{ $isEdit ? trim(strip_tags($product->description)) : old('description') }}</textarea>
                        @include('elements.error', ['fieldName' => 'description'])
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        @include('partials.image-upload')
    </div>
</div>

<button class="btn btn-success mt-4">
    {{ $isEdit ? 'Update Product' : 'Save Product' }}
</button>

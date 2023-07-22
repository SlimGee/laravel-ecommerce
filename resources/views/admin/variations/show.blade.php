<x-turbo-frame :id="$variation">
    <form id="@domid($variation)"
          class="row mb-2"
          data-controller="variations"
          action="{{ route('admin.variations.update', $variation) }}"
          method="post">
        @csrf
        @method('PATCH')
        <div class="col-md-3">
            {{ $variation->variant }}
        </div>
        <div class="col-md-3">
            <x-input name='price'
                     placeholder="0.00"
                     data-action="change->variations#submit"
                     error='variation.price'
                     :value="old('variation.price', $variation->price)" />
        </div>
        <div class="col-md-3">
            <x-input name='quantity'
                     placeholder="0"
                     data-action="change->variations#submit"
                     error='variation.quantity'
                     :value="old('variation.quantity', $variation->quantity)" />
        </div>
        <div class="col-md-3">
            <x-input name='sku'
                     data-action="change->variations#submit"
                     error='variation.sku'
                     :value="old('variation.sku', $variation->sku)" />

        </div>
    </form>

    <input form="storeProduct"
           type="hidden"
           name="variations[]"
           value="{{ $variation->id }}">
</x-turbo-frame>

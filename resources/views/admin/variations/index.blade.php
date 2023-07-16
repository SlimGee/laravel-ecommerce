@foreach ($variations as $key => $variation)
    <x-turbo-frame :id="$variation"
                   src="{{ route('admin.variations.show', $variation) }}">
    </x-turbo-frame>
@endforeach

@foreach (old('variations', []) as $variation)
    @if (!$variations->contains(fn($value, $key) => $variation == $value->id))
        <x-turbo-frame :id="'variation_' . $variation"
                       src="{{ route('admin.variations.show', $variation) }}">
        </x-turbo-frame>
    @endif
@endforeach

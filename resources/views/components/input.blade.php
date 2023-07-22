<input
       {{ $attributes->merge([
           'class' =>
               $attributes->has('error') &&
               $errors->{$attributes->has('bag') ? $attributes->get('bag') : 'default'}->has($attributes->get('error'))
                   ? 'form-control is-invalid'
                   : 'form-control',
       ]) }} />

@if ($attributes->has('error'))
    @error($attributes->get('error'), $attributes->has('bag') ? $attributes->get('bag') : null)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
@endif

<x-turbo-frame :id="$option">
    <div class="d-flex p-3 justify-content-between">
        <div class="">
            <div class="fs-6 fw-bold">
                {{ $option->name }}
            </div>
            <div class="w-full">
                @foreach ($option->values as $value)
                    <div class="badge badge-primary">
                        {{ $value->value }}
                    </div>
                @endforeach
            </div>
        </div>

        <div class="ml-auto">
            <a href="{{ route('admin.options.edit', $option) }}"
               data-turbo-frame="edit"
               class="btn btn-sm btn-outline-primary">Edit</a>
        </div>
    </div>

    <input form="storeProduct"
           type="hidden"
           name="options[{{ $option->id }}]"
           value="{{ $option->id }}">
</x-turbo-frame>

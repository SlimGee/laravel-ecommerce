<x-turbo-frame :id="$option">
    <form action="{{ route('admin.options.update', $option) }}"
          method="post"
          {{ stimulus_controller('fields', [
              'old' => old('option', ['' => '']),
          ]) }}>
        @csrf
        @method('PATCH')
        <div class="row flex align-items-start mx-3">
            <label class="form-label">Option name</label>

            <div class="form-group col-11 position-relative">
                <x-input name="option[name]"
                         :value="old('option.name', '')"
                         data-action="focus->fields#showTypeahead"
                         data-fields-target="input"
                         error='option.name'
                         :value="old('name', $option->name)" />

                <div {{ stimulus_target('fields', 'typeahead') }}
                     {{ stimulus_action('fields', 'closeTypeahead', 'fields:click:outside') }}
                     class="position-absolute row bg-white shadow rounded-lg w-100 p-1 d-none"
                     style="z-index:10">
                    <div class="col-12 class p-2 rounded-lg mb-1 bg-secondary-hover text-white-hover rounded cursor-pointer-hover"
                         {{ stimulus_action('fields', 'updateInput', 'click', [
                             'update' => 'Size',
                         ]) }}>
                        Size
                    </div>

                    <div class="col-12 p-2 rounded-lg mb-1 bg-secondary-hover text-white-hover rounded cursor-pointer-hover"
                         {{ stimulus_action('fields', 'updateInput', 'click', [
                             'update' => 'Color',
                         ]) }}>
                        Color
                    </div>

                    <div class="col-12 p-2 rounded-lg mb-1 bg-secondary-hover text-white-hover rounded cursor-pointer-hover"
                         {{ stimulus_action('fields', 'updateInput', 'click', [
                             'update' => 'Material',
                         ]) }}>
                        Material
                    </div>

                    <div class="col-12 p-2 rounded-lg bg-secondary-hover text-white-hover rounded cursor-pointer-hover"
                         {{ stimulus_action('fields', 'updateInput', 'click', [
                             'update' => 'Style',
                         ]) }}>
                        Style
                    </div>
                </div>

            </div>
            <div class="col-1">
                <span class='btn btn-outline-primary'>
                    <i class="fas fa-trash-alt"></i>
                </span>
            </div>

            <div class="form-group mb-0">
                <label class="form-label">Option values</label>
            </div>
        </div>

        @foreach (old('option.values', $option->values) as $key => $option)
            @if (!is_null($option))
                <div class="flex row align-items-start mx-3">
                    <div class="form-group col-11">
                        <x-input name="option[values][]"
                                 :error="'option.values.' . $key"
                                 data-action="input->fields#addOptionValue:once"
                                 :value="$option?->value ?? $option" />
                    </div>
                    <div class="col-1">
                        <span class='btn btn-danger'
                              {{ stimulus_action('fields', 'removeOptionValue', 'click') }}>
                            <i class="fas fa-trash"></i>
                        </span>
                    </div>
                </div>
            @endif
        @endforeach

        <template {{ stimulus_target('fields', 'template') }}>
            <div class="flex row align-items-start mx-3">
                <div class="form-group col-11">
                    <x-input name="option[values][]"
                             data-action="input->fields#addOptionValue:once" />
                </div>
                <div class="col-1 d-none">
                    <span class='btn btn-danger'
                          {{ stimulus_action('fields', 'removeOptionValue', 'click') }}>
                        <i class="fas fa-trash"></i>
                    </span>
                </div>
            </div>
        </template>

        <div class="form-group mx-4">
            <button type="submit"
                    class="btn btn-primary">Done</button>
        </div>
    </form>
</x-turbo-frame>

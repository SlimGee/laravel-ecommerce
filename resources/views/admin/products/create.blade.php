@extends('layouts.app')

@section('title')
    Add New Product
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.products.index') }}"
                   class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Create New Product</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Products</a></div>
                <div class="breadcrumb-item">Create New Product</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Create New Product</h2>

            <p class="section-lead">
                On this page you can create a new product and fill in all fields.
            </p>

            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-7">
                        <div class="card rounded-lg">
                            <div class="card-header">
                                <h4>Basic Info</h4>
                            </div>
                            <div class="card-body">
                                <form class=""
                                      action="{{ route('admin.products.store') }}"
                                      method="post"
                                      id="storeProduct">
                                    @csrf

                                    <div class="form-group mb-3">
                                        <label class="col-form-label"
                                               for='name'>Name</label>
                                        <input type="text"
                                               name="name"
                                               id='name'
                                               class="form-control @error('name') is-invalid @enderror"
                                               value="{{ old('name') }}">

                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for='description'
                                               class="col-form-label">
                                            Description
                                        </label>

                                        <textarea name="description"
                                                  id='description'
                                                  rows="8"
                                                  cols="80"
                                                  {{ stimulus_controller('ckeditor') }}>{{ old('description') }}</textarea>

                                        @error('description')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="card rounded-lg">
                            <div class="card-header">
                                <h4>Media</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group"
                                     data-controller="filepond"
                                     data-filepond-process-value="{{ route('admin.images.store') }}"
                                     data-filepond-restore-value="{{ route('admin.images.show') }}"
                                     data-filepond-revert-value="{{ route('admin.images.destroy') }}"
                                     data-filepond-current-value="{{ json_encode(old('images', [])) }}">

                                    <input type="file"
                                           data-filepond-target="input">

                                    @foreach (old('images', []) as $image)
                                        <input data-filepond-target="upload"
                                               type="hidden"
                                               name="images[]"
                                               form="storeProduct"
                                               value="{{ $image }}">
                                    @endforeach

                                    <template data-filepond-target="template">
                                        <input data-filepond-target="upload"
                                               type="hidden"
                                               name="NAME"
                                               form="storeProduct"
                                               value="VALUE">
                                    </template>
                                </div>
                            </div>
                        </div>

                        <div class="card rounded-lg">
                            <div class="card-header">
                                <h4>Pricing</h4>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">

                                    <div class="form-group col-md-6">
                                        <label class="form-label"
                                               for='price'>Price</label>

                                        <div class="input-group">
                                            <div class="input-group-text">
                                                $
                                            </div>

                                            <input form="storeProduct"
                                                   type="text"
                                                   name="price"
                                                   id='price'
                                                   placeholder="0.00"
                                                   class="form-control @error('price') is-invalid @enderror"
                                                   value="{{ old('price') }}">
                                            @error('price')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="form-label"
                                               for='discounted_price'>Discounted price</label>

                                        <div class="input-group">
                                            <div class="input-group-text">
                                                $
                                            </div>

                                            <input form="storeProduct"
                                                   type="text"
                                                   name="discounted_price"
                                                   id='discounted_price'
                                                   placeholder="0.00"
                                                   class="form-control @error('compare_price') is-invalid @enderror"
                                                   value="{{ old('compare_price') }}">
                                            @error('compare_price')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label"
                                           for='cost'>Cost per item</label>

                                    <div class="input-group">
                                        <div class="input-group-text">
                                            $
                                        </div>

                                        <input form="storeProduct"
                                               type="text"
                                               name="cost"
                                               id='cost'
                                               placeholder="0.00"
                                               class="form-control @error('cost') is-invalid @enderror"
                                               value="{{ old('cost') }}">
                                        @error('cost')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <span class="text-sm text-secondary d-block mt-2">Customers won't see this</span>

                                </div>
                            </div>
                        </div>

                        <div class="card rounded-lg"
                             data-controller="inventory">
                            <div class="card-header">
                                <h4>Inventory</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label"
                                           for='sku'>SKU</label>

                                    <input id='sku'
                                           form="storeProduct"
                                           type="text"
                                           name="sku"
                                           class="form-control @error('sku') is-invalid @enderror"
                                           value="{{ old('sku') }}">

                                    @error('sku')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="custom-switch pl-0">
                                        <input form="storeProduct"
                                               checked
                                               type="checkbox"
                                               name="track_quantity"
                                               data-action="input->inventory#toggle"
                                               class="custom-switch-input @error('track_quantity')
is-invalid
@enderror">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">Track quantity</span>
                                    </label>
                                    @error('track_quantity')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group"
                                     data-inventory-target="checkbox">
                                    <label class="custom-switch pl-0">
                                        <input form="storeProduct"
                                               type="checkbox"
                                               name="sell_out_of_stock"
                                               class="custom-switch-input @error('sell_out_of_stock') is-invalid @enderror">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">Continue selling when out of stock</span>
                                    </label>
                                    @error('sell_out_of_stock')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group"
                                     data-inventory-target="quantity">
                                    <label class="form-label"
                                           for='quantity'>Quantity</label>

                                    <input form="storeProduct"
                                           type="text"
                                           name="quantity"
                                           id='quantity'
                                           class="form-control @error('quantity') is-invalid @enderror"
                                           value="{{ old('quantity') }}">

                                    @error('quantity')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card rounded-lg"
                             {{ stimulus_controller('options', [
                                 'state' => is_array(old('options', null)),
                             ]) }}>
                            <div class="card-header">
                                <h4>Options</h4>
                            </div>
                            <div class="card-body"
                                 {{ stimulus_target('options', 'card') }}>
                                <div class="form-group mb-3">
                                    <label class="custom-switch pl-0">
                                        <input type="checkbox"
                                               name="custom-switch-checkbox"
                                               class="custom-switch-input"
                                               @checked(is_array(old('options', null)))
                                               {{ stimulus_action('options', 'toggle') }}>
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">This product has options, like size or
                                            color</span>
                                    </label>
                                </div>

                                @include('admin.options.create')

                                @foreach (old('options', []) as $option)
                                    <turbo-frame id='option_{{ $option }}'
                                                 src="{{ route('admin.options.show', $option) }}"
                                                 loading="lazy">
                                    </turbo-frame>
                                @endforeach

                            </div>

                            <div class="card-footer border-top d-none"
                                 {{ stimulus_target('options', 'footer') }}>
                                <button class="btn btn-link btn-lg"
                                        {{ stimulus_action('options', 'addForm') }}>
                                    <i class="fa fa-plus"></i> Add another one
                                </button>
                            </div>
                        </div>

                        <div class="card rounded-lg">
                            <div class="card-header">
                                <h4>Variations</h4>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-3 font-weight-bold">
                                        Variation
                                    </div>
                                    <div class="col-md-3 font-weight-bold">
                                        Price
                                    </div>
                                    <div class="col-md-3 font-weight-bold">
                                        Quantity
                                    </div>
                                    <div class="col-md-3 font-weight-bold">
                                        SKU
                                    </div>
                                </div>

                                <div class=""
                                     id="variations">

                                </div>
                            </div>
                        </div>

<div class="card rounded-lg">
    <div class="card-header">
        <h4>Search Engine Optimization</h4>
    </div>
    <div class="card-body">
        <div class='form-group'>
            <label for='canonical_url' class='form-label'>
                Canonical URL
            </label>
            <x-input name="canonical_url" error='canonical_url' form="storeProduct" :value="old('canonical_url')" />
        </div>
        <div class='form-group'>
            <label for='seo_title' class='form-label'>
                SEO Title
            </label>
            <x-input name="seo_title" error='seo_title' form="storeProduct" :value="old('seo_title', '')" />
        </div>

        <div class='form-group'>
            <label for='seo_keywords' class='form-label'>
                SEO Keywords
            </label>
            <x-input name="seo_keywords" error='seo_keywords' form="storeProduct" :value='old("seo_keywords","")' />
        </div>

        <div class='form-group'>
            <label class='form-label' for='seo_description'>
                SEO Description
            </label>
            <textarea name="seo_description" id="seo_description" form="storeProduct" class='form-control'>{{ old('seo_description', '') }}</textarea>
        </div>
    </div>
</div>
                    </div>
                    <div class="col-12 col-md-5">
                        <div class="card rounded-lg">
                            <div class="card-header">
                                <h4>Product status</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <select form="storeProduct"
                                            name="status"
                                            class="form-select @error('status') is-invalid @enderror">
                                        <option value="draft">Draft</option>
                                        <option value="review">Review</option>
                                        <option value="active">Active</option>
                                    </select>

                                    @error('status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card rounded-lg">
                            <div class="card-header">
                                <h4>Product organization</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label"
                                           for='category_id'>Category</label>
                                    <select form="storeProduct"
                                            name="category_id"
                                            id='category_id'
                                            class="form-select @error('category_id') is-invalid @enderror">
                                        @foreach ($categories as $category)
                                            @if ($category->id == old('category_id') || strtolower($category->name) == 'default')
                                                <option selected
                                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                            @else
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group text-right">
                            <input type="submit"
                                   class="btn btn-primary btn-lg"
                                   value="Save"
                                   form="storeProduct">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

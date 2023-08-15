@extends('layouts.app')

@section('title')
    Legal Settings
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.settings.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Lega Settings</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="#">Settings</a></div>
                <div class="breadcrumb-item">General Settings</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Legal Settings</h2>
            <p class="section-lead">
                You can create your own legal pages, or create them from templates and customize them. The templates are not legal advice and need to be customized for your store.

                Your saved policies will be linked in the footer of your checkout. You may need to add your policies to menus in your online store

                By using these templates you agree that you’ve read and agreed to the disclaimer
            </p>

            <div id="output-status"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>Jump To</h4>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-pills flex-column">
                                    <li class="nav-item"><a href="{{ route('admin.settings.general.show') }}" class="nav-link">General</a></li>
                                    <li class="nav-item"><a href="{{ route('admin.settings.legal.show') }}" class="nav-link active">Legal</a></li>
                                    <li class="nav-item"><a href="#" class="nav-link">Social</a></li>
                                    <li class="nav-item"><a href="#" class="nav-link">Misc</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <form action="{{ route('admin.settings.legal.update') }}" method="POST">
                            @method('PATCH')
                            <div class="card" id="settings-card">
                                <div class="card-header">
                                    <h4>General Settings</h4>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted">Legal settings such as, terms of service and privacy policy
                                        and so on.</p>
                                    <div class="form-group">
                                        <label for="site-title" class="form-control-label">Terms of Service</label>
                                        <textarea name="terms_of_service" class="form-control @error('terms_of_service') is-invalid @enderror" {{ stimulus_controller('ckeditor') }}>{{ old('terms_of_service', $settings->terms_of_service) }}</textarea>
                                        @error('terms_of_service')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <div class='mt-3'>
                                            <button type="button" class="btn btn-primary btn-sm">Create from template</button>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="site-title" class="form-control-label">Privacy Policy</label>
                                        <textarea name="privacy_policy" class="form-control @error('privacy_policy') is-invalid @enderror" {{ stimulus_controller('ckeditor') }}>{{ old('privacy_policy', $settings->privacy_policy) }}</textarea>
                                        @error('privacy_policy')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <div class='mt-3'>
                                            <button type="button" class="btn btn-primary btn-sm"> Create from template</button>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="site-title" class="form-control-label">Refund Policy</label>
                                        <textarea name="refund_policy" class="form-control @error('refund_policy') is-invalid @enderror" id="" cols="30" rows="10" {{ stimulus_controller('ckeditor') }}>{{ old('refund_policy', $settings->refund_policy) }}</textarea>
                                        @error('refund_policy')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <div class='mt-3'>
                                            <button type="button" class="btn btn-primary btn-sm">Create from template</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-whitesmoke text-md-right">
                                    <button type="submit" class="btn btn-primary" id="save-btn">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection



@extends('layouts.app')

@section('title')
    General Settings
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.settings.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>General Settings</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="#">Settings</a></div>
                <div class="breadcrumb-item">General Settings</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">All About General Settings</h2>
            <p class="section-lead">
                You can adjust all general settings here
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
                                    <li class="nav-item"><a href="{{ route('admin.settings.general.show') }}" class="nav-link active">General</a></li>
                                    <li class="nav-item"><a href="{{ route('admin.settings.legal.show') }}" class="nav-link">Legal</a></li>
                                    <li class="nav-item"><a href="#" class="nav-link">Social</a></li>
                                    <li class="nav-item"><a href="#" class="nav-link">Misc</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <form id="setting-form" action="{{ route('admin.settings.general.update') }}" method="POST">
                            @method('PATCH')
                            <div class="card" id="settings-card">
                                <div class="card-header">
                                    <h4>General Settings</h4>
                                </div>
                                <div class="card-body">
        +                            <p class="text-muted">General settings such as, site title, site description, address
                                        and so on.</p>
                                    <div class="form-group row align-items-center">
                                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Site
                                            Name</label>
                                        <div class="col-sm-6 col-md-9">
                                            <input type="text" name="site_name" class="form-control @error('site_name') is-invalid @enderror" id="site-title" value="{{ old('site_name', $settings->site_name) }}">
                                            @error('site_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Contact Email</label>
                                        <div class="col-sm-6 col-md-9">
                                            <input type="text" name="contact_email" class="form-control @error('contact_email') is-invalid @enderror" id="site-title" value="{{ old('contact_email', $settings->contact_email) }}">
                                            @error('contact_email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Sender Email</label>
                                        <div class="col-sm-6 col-md-9">
                                            <input type="text" name="sender_email" class="form-control @error('sender_email') is-invalid @enderror" id="site-title" value="{{ old('sender_email', $settings->sender_email) }}">
                                            @error('sender_email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center">
                                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Legal Business Name</label>
                                        <div class="col-sm-6 col-md-9">
                                            <input type="text" name="legal_name" class="form-control @error('legal_name') is-invalid @enderror" id="site-title" value="{{ old('legal_name', $settings->legal_name) }}">
                                            @error('legal_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center">
                                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Phone</label>
                                        <div class="col-sm-6 col-md-9">
                                            <input type="text" name="phone" class="form-control phone-number @error('phone') is-invalid @enderror" id="site-title" value="{{ old('phone', $settings->phone) }}">
                                            @error('phone')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center">
                                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Address</label>
                                        <div class="col-sm-6 col-md-9">
                                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address', $settings->address) }}">
                                            @error('address')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center">
                                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Legal Business Name</label>
                                        <div class="col-sm-6 col-md-9">
                                            <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" value="{{ old('city', $settings->city) }}">
                                            @error('city')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center">
                                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Legal Business Name</label>
                                        <div class="col-sm-6 col-md-9">
                                            <input type="text" name="country" class="form-control @error('country') is-invalid @enderror" id="site-title" value="{{ old('country', $settings->country) }}">
                                            @error('country')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center">
                                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Currency</label>
                                        <div class="col-sm-6 col-md-9">
                                            <input type="text" name="currency" class="form-control @error('currency') is-invalid @enderror" value="{{ old('currency', $settings->currency) }}">
                                            @error('currency')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center">
                                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Currency Symbol</label>
                                        <div class="col-sm-6 col-md-9">
                                            <input type="text" name="currency_symbol" class="form-control @error('currency_symbol') is-invalid @enderror" id="site-title" value="{{ old('currency_symbol', $settings->currency_symbol) }}">
                                            @error('currency_symbol')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="form-control-label col-sm-3 mt-3 text-md-right">Google Analytics
                                            Code</label>
                                        <div class="col-sm-6 col-md-9">
                                            <textarea class="form-control codeeditor codemirror @error('google_analytics_code') is-invalid @enderror" name="google_analytics_code">{{ old('google_analytics_code', $settings?->google_analytics_code) }}</textarea>
                                            @error('google_analytics_code')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-whitesmoke text-md-right">
                                    <button type="submit" class="btn btn-primary" id="save-btn">Save Changes</button>
                                    <a href="#" class="btn btn-danger" type="button">Reset to default</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

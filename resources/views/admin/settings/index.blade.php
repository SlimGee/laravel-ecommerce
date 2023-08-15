@extends('layouts.app')

@section('title')
    Settings
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Settings</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Settings</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Overview</h2>
            <p class="section-lead">
                Organize and adjust all settings about this site.
            </p>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-cog"></i>
                            </div>
<div class="card-body">
    <h4>General</h4>
    <p>General settings such as, site title, site description, address and so on.</p>
    <a href="{{ route('admin.settings.general.show') }}" class="card-cta">Change Setting <i class="fas fa-chevron-right"></i></a>
</div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-search"></i>
                            </div>
                            <div class="card-body">
                                <h4>Legal</h4>
                                <p>Legal settings such as, terms of service and privacy policy.</p>
                                <a href="{{ route('admin.settings.legal.show') }}" class="card-cta">Change Setting <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-mobile"></i>
                            </div>
                            <div class="card-body">
                                <h4>Social</h4>
                                <p>Social networks settings, your Twitter, Facebook and IG handles.</p>
                                <a href="#" class="card-cta">Change Setting <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-stopwatch"></i>
                            </div>
                            <div class="card-body">
                                <h4>Misc</h4>
                                <p>Settings about miscellaneous things you might prefer.</p>
                                <a href="#" class="card-cta text-primary">Change Setting <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.home')

@section('title')
    Home
@endsection

@section('content')
    <section class="section-intro bg-primary p-0">
        <div id="carousel1_indicator" class="carousel slide" data-ride="carousel" style="height: 80vh">
            <ol class="carousel-indicators">
                <li data-target="#carousel1_indicator" data-slide-to="0" class="active"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active" style="height: 80vh">
                    <div class="d-block w-100 h-100 text-white "
                         style="background-size: cover; background-repeat: no-repeat; background-position: center; background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.6)), url('{{ asset('images/banners/7.jpg') }}')">
                        <div class="container h-100">
                            <div class="d-flex h-100 align-items-center">
                                <div class="col-md-7 text-center text-md-start">
                                    <h1 class="text-capitalize display-4" style="font-weight: 500">
                                        quality guaranteed products at reasonable pricing
                                    </h1>
                                    <p class="lead">
                                        We bring you amazing products of your choice backed by exceptional after care service.
                                    </p>
                                    <a href="#" class="btn btn-primary">
                                        Shop Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<section class="section-specials padding-y border-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4 mb-md-0">
                <figure class="itemside">
                    <div class="aside">
                        <span class="icon-sm rounded-circle bg-primary">
                            <i class="fa fa-money-bill-alt white"></i>
                        </span>
                    </div>
                    <figcaption class="info">
                        <h6 class="title">Reasonable prices</h6>
                        <p class="text-muted">We bring you amazing products of your choice backed by exceptional after care service.</p>
                    </figcaption>
                </figure> <!-- iconbox // -->
            </div><!-- col // -->
            <div class="col-md-4  mb-4 mb-md-0">
                <figure class="itemside">
                    <div class="aside">
                        <span class="icon-sm rounded-circle bg-danger">
                            <i class="fa fa-comment-dots white"></i>
                        </span>
                    </div>
                    <figcaption class="info">
                        <h6 class="title">Customer support 24/7 </h6>
                        <p class="text-muted">Ring us anytime to get assistance on anything that might be bothering you when using any of our products  </p>
                    </figcaption>
                </figure> <!-- iconbox // -->
            </div><!-- col // -->
            <div class="col-md-4  mb-4 mb-md-0">
                <figure class="itemside">
                    <div class="aside">
                        <span class="icon-sm rounded-circle bg-success">
                            <i class="fa fa-truck white"></i>
                        </span>
                    </div>
                    <figcaption class="info">
                        <h6 class="title">Quick delivery</h6>
                        <p class="text-muted">
                            Enjoy the convinience of quick deliveries as soon as you place an order with us
                        </p>
                    </figcaption>
                </figure> <!-- iconbox // -->
            </div><!-- col // -->
        </div> <!-- row.// -->

    </div> <!-- container.// -->
</section>

<section class="padding-y bg-light">
    <div class="container">
        <!-- ============ COMPONENT BS CARD WITH IMG ============ -->
        <div class="row gy-3">
            @foreach ($categories->take(3) as $category)
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <article class="card bg-dark border-0">
                        <img src="{{ $category->products->random()->fetchAllMedia()->random()?->file_url }}"
                             class="card-img opacity" style="object-fit: cover" height="200">
                        <div class="card-img-overlay">
                            <h5 class="mb-0 text-white">{{ $category->name }}</h5>
                            <p class="card-text text-white">{{ Str::limit($category->description) }}</p>
                            <a href="#"
                               class="btn btn-secondary">
                                Discover
                            </a>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

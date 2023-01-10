@extends('user-backend-layout')

@section('title', 'New Order')


@section('content')
    <section class="section new-order-section">
        <div class="container">
            <div class="row text-sm-center justify-content-sm-center">
                <div class="col-lg-9 col-12">
                    <h2 class="section-heading">
                        Give wings to your brand and create an amazing online presence
                        with our niche- based services.
                    </h2>
                    <p class="para">
                        Founders, Startups, Agencies, Developers, and Freelancers; we’ve
                        got you covered. There’s no limit to what you can get at
                        LogoInUSA. Our services make sure you always hit the mark with
                        your branding.
                    </p>
                </div>
            </div>
        </div>

        <div class="new-order">

            <div class="container-fluid">

                <div class="row ">
                    @foreach ($categories as $category)
                        <div class="col-lg-3 justify-content-center col-12 col-md-6">
                            <div class="new-order-category">
                                <img src="{{ $category->image_path }}" alt="" />
                                <div class="category-name">{{ $category->name }}</div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('categories') }}"><button
                                        class="btn btn-radius">Choose Plan</button></a>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

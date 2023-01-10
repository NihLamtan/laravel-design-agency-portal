@extends('frontend-layout')

<style>
.pricing-section {
    position: relative;

}

.loading {
    
    top: 50%;
    left: 50%;
    position: absolute;
    color: #B22234;
    font-size: 30px;
}
</style>
@section('title', 'Categories')

@section('content')

<section class="section">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="service-banner-content text-center">
                    <h1 class="banner-title">
                    Best Attractive <br>
                    Design For Your Project
                    </h1>
                    <p class='body-intro'>
                    Get the best design for your businerss
                    </p>
                    <div class="buttons justify-content-center">
                        <button class="dark-btn mr-2">Get Started</button>
                        <button class="dark-btn schedule-btn">Call Schedule</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="portfolio-showcase">
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-12">
                <div>
                    <img src="/images/portfolio-showcase.png" class='img-fluid' alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section pricing-section">

<livewire:categories />
</section>
<section>
        <div class="container">
            <div class="row">
               <x-cta />
            </div>
        </div>
</section>
@endsection

@push('script')
<script>
    document.addEventListener('livewire:load', function(){
        Livewire.on('servicesModal', function(){
            $('#serviceCategoryModal').modal('show');
        })
    })
</script>
@endpush
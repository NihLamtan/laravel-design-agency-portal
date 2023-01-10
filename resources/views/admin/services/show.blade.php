@extends('layout')

@section('content')


<header class="main-content-header">
    <div class="row  align-items-center">
        <div class="col-lg-10">
            <h1>New Services</h1>
        </div>
        <div class="col-lg-2">
            <button class="btn btn-primary mt-0"><a href="{{ route('services.edit', $service->id) }}">Edit Service</a></button>
        </div>
    </div>
</header>

<div class="main-content-body">
    <div class="container ">
        <div class="row ">
            <div class="col-lg-3  d-flex align-items-center justify-content-center">
                <h3 class="field-name pr-4">NAME</h3>
            </div>
            <div class="col-lg-4">
                <h3 class="field-value">{{ $service->name }}</h3>
            </div>
        </div>
        <div class="row ">
            <div class="col-lg-3  d-flex align-items-center justify-content-center">
                <h3 class="field-name pr-4">PRICE</h3>
            </div>

            <div class="col-lg-4">
                <h3 class="field-value">{{ $service->price }}</h3>
            </div>
        </div>
        <div class="row ">
            <div class="col-lg-3  d-flex align-items-center justify-content-center">
                <h3 class="field-name pr-4">IMAGE</h3>
            </div>

            <div class="col-lg-4">

                <h3 class="field-value">{{ $service->image_upload }}</h3>
            </div>
        </div>
        <div class="row ">
            <div class="col-lg-3  d-flex align-items-center justify-content-center">
                <h3 class="field-name pr-4">SERVICE CATEGORY</h3>
            </div>

            <div class="col-lg-4">

                <h3 class="field-value">{{ $service->service_category }}</h3>
            </div>
        </div>
        <div class="row ">
            <div class="col-lg-3  d-flex align-items-center justify-content-center">
                <h3 class="field-name pr-4">META TITLE</h3>
            </div>

            <div class="col-lg-4">

                <h3 class="field-value">{{ $service->meta_title }}</h3>
            </div>
        </div>
        <div class="row ">
            <div class="col-lg-3  d-flex align-items-center justify-content-center">
                <h3 class="field-name pr-4">META DESCRIPTION</h3>
            </div>

            <div class="col-lg-4">

                <h3 class="field-value">{{ $service->meta_description }}</h3>
            </div>
        </div>

    </div>
</div>

@endsection
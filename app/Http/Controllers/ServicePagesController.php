<?php

namespace App\Http\Controllers;
    
use App\Models\ServiceCategory;
use App\Models\Service;



class ServicePagesController extends Controller
{
    public function index($slug)
    {
        // $services_bundle = Service::find($slug);

        $service_category = ServiceCategory::with('services')->where('slug', $slug)->first();
        $service_bundle = $service_category->services()->where('bundle', true)->first();
        
        if ($service_category) {
            $title = $service_category->name;

            return view("pages.{$service_category->slug}", compact('title', 'service_category', 'service_bundle'));
        } else {
            return redirect('/');
        }
    }
}

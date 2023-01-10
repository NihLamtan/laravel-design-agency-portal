<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ServiceCategory;
use App\Models\Service;

class Categories extends Component
{
    public $categories;
    public $services;
    public $active_category;
    public $active_service;
    public $service_id;
    public $targetted_service;
    public $services_bundle;
    public $service_packages=[];
    public $default_category = 17;


    public function __construct()
    {
        $this->categories = ServiceCategory::orderBy('sorting', 'Asc')->get();
        $this->services = Service::where('popular', true)->get();
        $this->services_bundle = Service::where('bundle', true)->first();
        $this->active_category  = $this->default_category;
    }

    public function render()
    {
        return view('livewire.categories');
    }

    public function modalServiceId($service_id)
    {
        $this->service_id = $service_id;
        $this->targetted_service = $this->services->where('id', $service_id)->first();
        $this->emit('servicesModal');
    }


    public function changeServices($category_id)
    {
        $this->active_category = $category_id;
        $this->services = Service::where('category_id', $category_id)->get();
        $this->services_bundle = Service::where('category_id', $category_id)->first();
        
    }
}

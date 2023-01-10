<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Country;

class SelectCountry extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $countries = Country::pluck('name', 'code')->toArray();
        return view('components.select-country', compact('countries'));
    }
}

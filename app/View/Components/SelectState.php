<?php

namespace App\View\Components;

use Illuminate\View\Component;
use PragmaRX\Countries\Package\Countries;

class SelectState extends Component
{
    public $states;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $this->states = Countries::where('name.common', 'United States')
                            ->first()
                            ->hydrateStates()
                            ->states
                            ->sortBy('name')
                            ->pluck('name', 'postal');
        return view('components.select-state');
    }
}

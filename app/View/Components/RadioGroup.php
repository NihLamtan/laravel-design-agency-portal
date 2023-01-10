<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RadioGroup extends Component
{
    public $options;
    public $selected;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($options = [], $selected = '')
    {
        $this->options = $options;
        $this->selected = $selected;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.radio-group');
    }

    public function isSelected($option)
    {
        return $option === $this->selected;
    }
}

<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Select extends Component
{
    public $options;
    public $selected;
    public $title = '';

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($options = [], $selected = '', $title = 'Select')
    {
        $this->options = $options;
        $this->selected = $selected;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.select');
    }

    /**
     * Determine if the given option is the current selected option.
     *
     * @param string $option
     *
     * @return bool
     */
    public function isSelected($option)
    {
        return $option === $this->selected;
    }
}

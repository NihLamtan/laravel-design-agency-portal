<?php

namespace App\View\Components\Admin;

use App\Models\Order;
use Illuminate\View\Component;

class OrderBrief extends Component
{
    public $order;
    public $component;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $component = '';
        $order = $this->order;
        if (in_array($order->service->category->slug, ['logo-design-and-identity', 'art-and-illustration', 'packaging-and-label', 'book-and-magazine'])) {
            $component = 'logo-brief-component';
        } elseif (in_array($order->service->category->slug, ['web-and-app-design', 'business-and-advertising', 'clothing-and-marchandise'])) {
            $component = 'web-brief-component';
        } elseif (in_array($order->service->category->slug, ['explainer-video-whiteboard-animation', 'animated-gifs', 'logo-animation', 'app-and-website-video-preview', '3d-character-modeling-and-animation', '3d-product-animation', 'book-trailer', 'animated-videos-for-kids'])) {
            $component = 'animation-component';
        }
        $this->component = $component;

        return view('components.admin.order-brief');
    }
}

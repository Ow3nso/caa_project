<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FlightOpsLayout extends Component
{
    public string $title;

    public function __construct(string $title = 'Flight Operations')
    {
        $this->title = $title;
    }

    public function render()
    {
        return view('components.flight-ops-layout');
    }
}
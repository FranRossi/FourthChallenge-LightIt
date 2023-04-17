<?php

namespace App\View\Components;

use App\Models\City;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CityDropdown extends Component
{

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.city-dropdown', [
            'cities' => City::all()
        ]);
    }
}

<?php

namespace App\View\Components;

use App\Models\Flight;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FlightTableBody extends Component
{

    public static function renderFlights($flights)
    {
        return view('components.flight.table-body', [
            'flights' => $flights
        ]);
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('flight.table-body', [
            'flights' => Flight::orderByDesc('id')->paginate(5)
        ]);
    }
}

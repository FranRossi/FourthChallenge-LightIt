<?php

namespace App\Http\Requests;

use App\Models\Flight;
use Illuminate\Foundation\Http\FormRequest;

class StoreFlightRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'airline_id' => ['required', 'exists:airlines,id'],
            'city_departure_id' => ['required', 'exists:cities,id'],
            'city_arrival_id' => ['required', 'exists:cities,id', 'different:city_departure_id'],
            'departure_date' => ['required', 'date'],
            'arrival_date' => ['required', 'date', 'after:departure_date'],
        ];
    }
}

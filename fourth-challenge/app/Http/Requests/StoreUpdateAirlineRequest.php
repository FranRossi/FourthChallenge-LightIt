<?php

namespace App\Http\Requests;

use App\Models\Airline;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateAirlineRequest extends FormRequest
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
     * @return array<string, Rule|array|string>
     */
    public function rules(Airline $airline = null): array
    {
        $airline = $airline ?? new Airline();
        return [
            'name' => ['required', Rule::unique('airlines', 'name')->ignore($airline), 'min:3', 'max:255'],
        ];
    }
}

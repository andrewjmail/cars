<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateVehicleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'model' => ['required', 'exists:App\Model,id'],
            'make' => ['required', 'exists:App\Make,id'],
            'fuel_type' => ['required', 'exists:App\FuelType,id'],
            'colour' => ['required'],
            'description' => ['optional'],
            'year' => ['required', 'date_format:Y'],
            'price' => ['required', 'numeric', 'min:0']
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Services\EarthService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EarthRequest extends FormRequest
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
            'initial' => [
                'required',
                'array',
                Rule::in([0, 1, 2]),
            ],
            'items' => [
                'required',
                'array',
                Rule::in(EarthService::getMovements()),
            ],
        ];
    }
}

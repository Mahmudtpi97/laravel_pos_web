<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'cat_id'        => 'required',
            'title'         => 'required',
            'price'         => 'nullable',
            'description'   => 'required',
            'p_image'       => 'nullable|mimes:png,jpg',
        ];
    }
}

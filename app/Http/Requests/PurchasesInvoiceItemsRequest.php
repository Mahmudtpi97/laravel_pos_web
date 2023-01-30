<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchasesInvoiceItemsRequest extends FormRequest
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
            // PurchaseInvoiceItem
            'product_id' => 'required|numeric',
            'price'      => 'required|numeric',
            'quantity'   => 'required|numeric',
            'total'      => 'required|numeric',

        ];
    }
    public function messages()
    {
       return [
           'product_id.numeric' => 'The Product Must Be Select'
      ];
    }
}

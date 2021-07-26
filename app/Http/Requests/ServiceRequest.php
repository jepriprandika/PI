<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
        if ($this->method() == 'PUT')
        {
            $sku = 'required|unique:services,sku,'. $this->get('id');
            $name = 'required|unique:services,name,'. $this->get('id');
        } else {
            $sku = 'required|unique:services,sku';
            $name = 'required|unique:services,name';
        }

        return [
            'sku' => $sku,
            'name' => $name,
            'price' => 'required|numeric',
            'status' => 'required',
        ];
    }
}

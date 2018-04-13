<?php

namespace Modules\Catalog\Http\Requests\TypeProduct;

use Illuminate\Foundation\Http\FormRequest;

class TypeProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      return [
        'title' => 'required',
        'tnved_id' => 'required',
        'sort' => 'required',
      ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}

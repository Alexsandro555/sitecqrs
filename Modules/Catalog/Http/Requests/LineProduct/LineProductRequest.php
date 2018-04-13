<?php

namespace Modules\Catalog\Http\Requests\LineProduct;

use Illuminate\Foundation\Http\FormRequest;

class LineProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'type_product_id' => 'required',
          'producer_id' => 'required',
          'name_line' => 'required',
          'sort' => 'required'
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

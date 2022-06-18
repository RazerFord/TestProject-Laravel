<?php

namespace App\Http\Requests\ProductRequests;

use App\Http\Requests\BaseRequest;

class ProductStore extends BaseRequest
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
            'name' => 'required|string|unique:products,name',
            'price' => 'required|numeric|gte:0',
            'published' => 'nullable|boolean',
            'categories' => 'nullable|array|min:2|max:10',
            'categories.*' => 'integer|numeric|distinct|exists:categories,id',
        ];
    }
}

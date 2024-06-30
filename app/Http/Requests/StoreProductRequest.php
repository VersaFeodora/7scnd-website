<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
                'product_name' => ['required', 'max:45'],
                'product_price' => ['required', 'numeric', 'min:0'],
                'product_qty' => ['required', 'numeric', 'min:0'],
                'product_brand' => ['max:45'],
                'product_size' => ['max:45'],
                'product_color' => ['max:45'],
                'product_desc' => ['max:255'],
                'product_img' => ['nullable'],
                'product_url' => ['max:450'],
                'category_id' => ['required', 'numeric'],
                'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ];
    }
}

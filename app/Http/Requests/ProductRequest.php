<?php

namespace App\Http\Requests;

use App\Rules\EnglishChars;
use App\Rules\PersianChars;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'title' => ['required', new PersianChars()],
            'english_title' => ['required', new EnglishChars()],
            'brand_id' => ['required', 'integer', 'exists:brands,id'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'price' => ['required', 'integer', 'min:1'],
            'price_discount' => ['nullable', 'integer', 'min:0'],
            'stock' => ['required', 'integer', 'min:1'],
            'description' => ['required'],
            'features' => ['required'],
        ];
    }
}

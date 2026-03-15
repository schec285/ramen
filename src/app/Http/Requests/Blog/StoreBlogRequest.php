<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
            'store_name' => 'required|string|max:50',
            'ramen_name' => 'required|string|max:50',
            'price' => 'required|integer|min:0',
            'latitude' =>'numeric|between:-90,90',
            'longitude' => 'numeric|between:-180,180',
            'place_id' => 'nullable|string|max:255',
            'country_iso' => 'nullable|string|size:2',
            'postal_code' => 'nullable|string|max:7',
            'prefecture' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:50',
            'formatted_address' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'thumbnail_image_path' => 'string|max:255',
            'score' => 'required|integer|between:0,100',
            'body' => 'nullable|string',
            'tags' => 'nullable|array',
            'tags.*' => 'string|max:50',
        ];
    }

    public function messages() 
    {
        return [
            'latitude.numeric' => '緯度なし: 店の場所を指定してください',
            'longitude.numeric' => '経度なし: 店の場所を指定してください',
        ];
    }
}

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
        return false;
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
            'postal_code' => 'required|string|max:7',
            'prefecture_id' => 'required|integer|exists:prefectures,id',
            'city' => 'required|string|max:50',
            'address' => 'required|string|max:100',
            'latitude' => 'numeric|between:-90,90',
            'longitude' => 'numeric|between:-180,180',
            'thumbnail_image_path' => 'string|max:255',
            'score' => 'required|integer|between:0,100',
            'body' => 'required|string',
        ];
    }
}

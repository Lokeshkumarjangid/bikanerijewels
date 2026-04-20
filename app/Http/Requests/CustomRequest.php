<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|integer',
            'address' => 'required|string|max:500',
            'custom_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'item_name' => 'nullable|string|max:255',
            'size' => 'nullable|string|max:50',
            'delivery_date' => 'nullable',
            'estimate' => 'nullable|numeric',
            'metal_purity' => 'nullable|string|max:50',
            'breadth' => 'nullable|string|max:50',
            'meena_front_side' => 'nullable|string|max:255',
            'back_side' => 'nullable|string|max:255',
            'utrai' => 'nullable|string|max:255',
            'buggate' => 'nullable|string|max:255',
            'diamond' => 'nullable|string|max:255',
            'rosecut' => 'nullable|string|max:255',
            'polki' => 'nullable|string|max:255',
            'dank' => 'nullable|string|max:255',
            'colour_stone' => 'nullable|string|max:255',
            'rodium' => 'nullable|string|max:255',
            'look' => 'nullable|string|max:255',
            'melting' => 'nullable|string|max:255',
            'mani' => 'nullable|string|max:255',
            'pearl' => 'nullable|string|max:255',
            'pearl_colour' => 'nullable|string|max:255',
            'cheedh' => 'nullable|string|max:255',
            'beads' => 'nullable|string|max:255',
            'melon' => 'nullable|string|max:255',
            'badam' => 'nullable|string|max:255',
            'goshware' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ];
    }

    protected function failedValidation($validator)
    {
        throw new \Illuminate\Http\Exceptions\HttpResponseException(
            response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422)
        );
    }
}

<?php

namespace App\Http\Requests;

use App\Rules\TitleUpperaCase;
use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'title'=> ['required', 'string' , 'max:5', new TitleUpperaCase()],
            'content' => ['required|min:10'],
            'user_id' => ['required|exists:users,id']
        ];
    }

    public function messages(): array
    {
        return [

            'title.required' => 'The title is required.',
            'title.string' => 'The title must be a string.',
            'title.max' => 'The title may not be greater than 5 characters.',

            'content.required' => 'The content is required.',
            'content.min' => 'The content must be at least 10 characters.',
            'user_id.required' => 'The user ID is required.',
            'user_id.exists' => 'The selected user ID is invalid.'
        ];
    }
}

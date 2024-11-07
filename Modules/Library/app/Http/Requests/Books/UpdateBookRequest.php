<?php

namespace Modules\Library\Http\Requests\Books;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'writer' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'isbn' => 'required|string',
            'publish_place' => 'required|string|max:255',
            'publish_year' => 'required|digits:4|integer|min:1000|max:' . date('Y'),
            'publish_period' => 'required|digits:4|integer|min:1000|max:' . date('Y'),
            'type' => 'required',
            'is_publish' => 'required|boolean',
            'stock' => 'required|integer|min:1',
            'category_id' => 'required|exists:library_book_categories,id',
            'language_id' => 'required|exists:base_languages,id',
            'synopsis' => 'required|string|max:1000',
            'cover_path' => 'file|image|mimes:jpeg,jpg|max:2048', // 2MB max size
            'book_path' => 'file|mimes:pdf|max:102400', // 100MB max size
        ];
    }

    public function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        toast($errors->first(), 'warning');
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLessonRequest extends FormRequest
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
            'grade' => 'required|exists:grades,id',
            'subject' => 'required|exists:subjects,id',
            'lesson_title' => 'required|min:3',
            'lesson_description' => 'required|min:10',
            'header_image' => 'nullable|mimes:jpeg,png|file|max:10000',
            'lesson_images.*' => 'nullable|mimes:jpeg,png|file|max:10000',
        ];
    }
}

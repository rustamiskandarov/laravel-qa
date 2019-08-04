<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AskQuestionRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:5|max:255',
            'body' => 'required|min:5|max:10000'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Введите заголовок',
            'body.required' => 'Введите текст вопроса',
            'body.min' => 'Минимальная длина [:min] символов',
            'title.min' => 'Минимальная длина [:min] символов',
            'body.max' => 'Максимальная длина [:max] символов',
            'title.max' => 'Максимальная длина [:max] символов',
        ];
    }
}

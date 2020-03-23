<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->role === 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255|filled|min:1',
            'ec' => 'required|integer|filled|gt:0',
            'type' => 'required|filled|max:255|min:1',
            'module_id' => 'required|filled|min:0',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeadlineRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return $this->user()->role === 'manager';
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'date' => 'date|filled',
      'tags' => 'array|filled',
      'tags.name' => 'string|filled|min:1|max:255',
      'exam_id' => 'integer|filled|gt:0'
    ];
  }
}

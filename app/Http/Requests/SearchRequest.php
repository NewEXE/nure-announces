<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
            's' => 'required|min:5|max:512',
        ];
    }
    
    public function messages()
    {
        return [
            'required' => 'Поле :attribute не должно быть пустым',
            'min' => 'Поле :attribute не должно быть меньше :min символов',
        ];
    }
}

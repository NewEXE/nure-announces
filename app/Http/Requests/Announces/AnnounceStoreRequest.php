<?php

namespace App\Http\Requests\Announces;

use Illuminate\Foundation\Http\FormRequest;
use App\Announce;

class AnnounceStoreRequest extends FormRequest
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
            'title' => 'required|min:5|max:512',
            'text' => 'required|min:5|max:32767',
            'image' => 'mimes:' . implode(', ', Announce::EXTENSIONS),
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

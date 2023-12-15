<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateSuporteRequest extends FormRequest
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
        $rules = [
            'assunto' => [
                'required'
                ,   'min:5'
                ,   'max:255'
                ,   'unique:suportes'
            ],
            'descricao' => [
                'required'
                ,   'min:5'
                ,   'max:255'
            ],
        ];

        if($this->method() === 'PUT'){
            $rules['assunto'] = [
                'required'
                , 'min: 5'
                , 'max: 255'
                , Rule::unique('suportes')->ignore($this->id)
            ];
        }

        return $rules;
    }
}

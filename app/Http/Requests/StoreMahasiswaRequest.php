<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMahasiswaRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nim' => 'required',
            'nama' => 'required',
            'kelas_id' => 'required',
            'jurusan' => 'required',
            'no_handphone' => 'required',
            'image_mhs'=> 'image|mimes:png,jpg'
        ];
    }
}

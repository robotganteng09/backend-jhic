<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePPDBRequest extends FormRequest
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
    $id = $this->route('id');

    return [
        'nama_siswa'   => 'required|string|max:255',
        'jurusan'      => 'required|string|max:255',
        'nama_walmur'  => 'required|string|max:255',
        'nohp_walmur'  => 'required|string|max:20',
        'nik'          => "required|string|max:20|unique:registers,nik,{$id}",
        'alamat'       => 'required|string',
    ];
}

}

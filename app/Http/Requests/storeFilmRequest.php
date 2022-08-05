<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeFilmRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'required|string',
            'film' => 'required|file|mimetypes:video/mp4,video/quicktime,video/quicktime,video/x-ms-wmv',
            'thumbnail' => 'file|mimetypes:image/jpeg,image/png',
            'durasi' => 'required|string',
            'durasi2' => 'required|string',
            'durasi3' => 'required|string',
            'id_category' => 'required',
        ];
        
    }
}

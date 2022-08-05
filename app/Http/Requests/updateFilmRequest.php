<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateFilmRequest extends FormRequest
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
            'title' => 'string',
            'description' => 'string',
            'film' => 'file|mimetypes:video/mp4,video/quicktime,video/quicktime,video/x-ms-wmv',
            'thumbnail' => 'image|',
            'durasi' => 'string',
            'durasi2' => 'string',
            'durasi3' => 'string',
            'id_category' => 'required',
        ];
    }
}

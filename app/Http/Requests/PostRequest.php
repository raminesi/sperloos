<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        $method = request()->method();
        switch ($method) {
            case 'POST':
                return [
                    'title' => 'required|string',
                    'content' => 'required|string',
                    'image' => 'required|max:1024|mimes:jpeg,jpg,png',
                ];
            break;
            case 'PUT':
                return [
                    'title' => 'required|string',
                    'content' => 'required|string',
                    'image' => (empty(request('image')) ? '' : 'max:1024|mimes:jpeg,jpg,png')
                ];
            break;
        }
    }
}

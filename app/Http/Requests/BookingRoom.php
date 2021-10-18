<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRoom extends FormRequest
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
            'checkInDate' => ['required'],
            'checkOutDate' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'checkInDate.required' => 'Please Select check In Date',
            'checkOutDate.required' => 'Please Select Check Out Date',
        ];
    }
}

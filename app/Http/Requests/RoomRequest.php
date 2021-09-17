<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
        if(request()->isMethod('post')) {
            return [
                'room_name' => 'required|string|max:258|unique:rooms',
                'pricePerNight' => 'required',
                'description' => 'required|string',
                'address' => 'required|string',
                'guestCapacity' => 'required',
                'numOfBeds' => 'required',
                //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                
            ];
        } else {
            return [
                'room_name' => 'required|string|max:258',
                //'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description' => 'required|string'
            ];
        }

      
    }

    
    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        if(request()->isMethod('post')) {
            return [
                'room_name.required' => 'Room Name is required!',
                'pricePerNight.required' => 'Price Per Night is required!',
                'description.required' => 'Descritpion is required!',
                'guestCapacity.required' => 'guest Capacity is required!',
                'numOfBeds.required' => 'Number of Beds is required!',
                //'image.required' => 'image is required!',
            ];
        } else {
            return [
                'name.required' => 'Name is required!',
                'description.required' => 'Descritpion is required!'
            ];   
        }
    }
}

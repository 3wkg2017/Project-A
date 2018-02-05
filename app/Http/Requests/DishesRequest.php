<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DishesRequest extends FormRequest
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
          'dish_name' => 'required|string|max:127',
          'dish_price' => 'required|numeric|max:10',
          'dish_description' => 'required|string|max:255',
          'dish_picture' => 'required|file|max:127'
            //
        ];
    }
}

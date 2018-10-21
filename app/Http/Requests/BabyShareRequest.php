<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BabyShareRequest extends FormRequest
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
        $ree =  [
            'bs_Fname'=>'required|array|between:2,6',
            // 'bs_Lname'=>'required'
        ];
        return $ree ;
    }
    // public function messages()
    // {
    //     return [
    //         'bs_Fname.required' => ['error' => 'message', 'code' => '409'],
    //         'bs_Lname.bs_Lname' => ['error' => 'message', 'code' => '400'],
    //     ];
    // }
}

<?php
/**
 * Created by PhpStorm.
 * User: wizxs
 * Date: 10/25/2015
 * Time: 1:56 PM
 */

namespace App\Http\Requests;


use Symfony\Component\HttpFoundation\Request;

class UpdateUserRequest extends Request
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
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'password' => 'min:5',

        ];
    }
}
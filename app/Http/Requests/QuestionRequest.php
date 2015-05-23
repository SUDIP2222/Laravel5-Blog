<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class QuestionRequest extends Request {

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
			'question'=>'required|min:10|max:20000',
                        'solved'=>'in:0,1'
		];
	}

}

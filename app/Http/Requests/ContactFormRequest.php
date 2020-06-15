<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
            'type' => 'required',
            'type.*' => 'in:相談したい,点検して欲しい,お見積もりが欲しい,その他',
            'name' => 'required|max:15',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required|max:20',
            'equipment' => 'required|max:30',
            'comment' => 'required|max:800',
        ];
    }
        
     public function attributes() 
     {
         return[
             'type' => 'お問い合わせ種別',
             'name' => 'お名前',
             'phone' => '電話番号',
             'email' => 'メールアドレス',
             'address' => '建物所在地',
             'equipment' => '点検希望設備',
             'comment' => 'コメント'
             ];
     }
}

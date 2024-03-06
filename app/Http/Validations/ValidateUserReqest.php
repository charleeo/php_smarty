<?php
namespace App\Http\Validations;


class ValidateUserReqest  extends BaseValidator{
  protected $rules =[];
   
   public function rules()
    {
       $this->rules = [
          'username' => 'required|min:2|max:32',
          'email' => 'required|email',
          'password' => 'required|valid_password|min:8|max:15',
       ];
       return $this->rules;
    }

}
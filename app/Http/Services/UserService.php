<?php
namespace App\Http\Services;

use App\Http\Requests\Request;
use App\Http\Validations\ValidateUserReqest;

class UserService {

    public function createUser(ValidateUserReqest $validation)
    {
        $data = [];
        $isValid = $validation->setData($_REQUEST)->validate($validation->rules());
        $request =  new Request;
        
        $userData =   [
            'email' => $request->request('email'),
            'password' => $request->request('password'),
            'username' => $request->request("username"),
        ];
       
       if(!$isValid){
         $data['error'] = true;
         $data['error_messages'] = $validation->messages();
         $data['user_data'] = $userData;
       }else{

        $data['error'] = false;
        $data['error_messages'] =null;
        $data['user_data'] = $userData;
       }
       return $data;
    }
}
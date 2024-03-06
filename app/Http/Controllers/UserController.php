<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use App\Http\Services\UserService;
use App\Http\Validations\ValidateUserReqest;

class UserController extends BaseController{
   protected $service;
   const USER_DATA ='user_data';
    public function __construct()
    {
       parent::__construct();
       $this->service = new UserService;
    }

/** 
 * The index page 
 */
    public function index()
    {
        if($this->method() == "POST"){//if we are processing a form 
          return  $this->register();
        }

        $this->session_forget(self::USER_DATA);//Forget this session data
        $this->assign("errors",[],true);
        $this->display('resources/templates/index.tpl');
    }
    
    /**
     * Register the user
     */
    public function register()
    {
        $data = $this->service->createUser(new ValidateUserReqest);
        
        if($data['error']){
            $this->assign('errors', $data['error_messages']);
            $this->assign('user_data', $data['user_data']);
            $this->display('resources/templates/index.tpl');
        }else {
            $userData = $data['user_data'];
            $this->session(self::USER_DATA,$userData);
            header('location:/success');
        }
    }
    
    /**
     * The success page after the validation
     */
    public function success()
    {
        $userData = $this->session_get(self::USER_DATA);
        $this->assign('data', $userData);
        $this->display('resources/templates/success.tpl');
    }
}
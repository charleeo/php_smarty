<?php
namespace App\Http\Controllers;

use App\Configs\SmartyConfig;

class BaseController extends SmartyConfig{
   protected $request;
    public function __construct()
    {
        parent::__construct();
        $this->request = $_SERVER;
    }

    protected function method()
    {
        return $this->request['REQUEST_METHOD'];
    }

    protected function session($key, $value)
    {
       return $_SESSION[$key] = $value;
    }

    protected function session_forget($key)
    {
       return $_SESSION[$key] = null;
    }

    protected function session_get($key)
    {
       return $_SESSION[$key] ?? null; 
    }
}
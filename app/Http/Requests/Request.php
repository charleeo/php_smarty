<?php

namespace App\Http\Requests;

class Request {

    protected $request;

    public function __construct()
    {
        $this->request = $_REQUEST;
    }

    /**
     * Process the request 
     */
    public function request($field)
    {
        // Check if the field exists in the request
        if (isset($this->request[$field])) {
            return $this->request[$field];
        } else {
            // Field not found, return null or handle it accordingly
            return null;
        }
    }
}
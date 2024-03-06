<?php

namespace App\Http\Validations;

class BaseValidator 
{
    protected $errors = [];
    protected $rules = [];
    protected $data;


    public function validate($rules)
    {
        foreach ($rules as $field => $rule) {
            $rulesArray = explode('|', $rule);
            foreach ($rulesArray as $rule) {
                $this->applyRule($field, $rule);
            }
        }
        
        return empty($this->errors);
    }

    public function getErrors()
    {
        return $this->errors;
    }

    protected function applyRule($field, $rule)
    {
        $parameters = explode(':', $rule);
        $ruleName = array_shift($parameters);
        $value = $this->data[$field] ?? null;

        switch ($ruleName) {

            case 'required':
                if (empty($value)) {
                    $this->addError($field, 'The ' . $field . ' field is required.');
                }
                break;

            case 'email':
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addError($field, 'The ' . $field . ' must be a valid email address.');
                }
                break;

            case 'min':
                $minLength = isset($parameters[0]) ? (int)$parameters[0] : 0;
                if (strlen($value) < $minLength) {
                    $this->addError($field, 'The ' . $field . ' must be at least ' . $minLength . ' characters long.');
                }
            break;

            case 'max':
                $maxLength = isset($parameters[0]) ? (int)$parameters[0] : 0;
                if (strlen($value) > $maxLength) {
                    $this->addError($field, 'The ' . $field . ' must not exceed ' . $maxLength . ' characters.');
                }
                break;

                case 'valid_password':
                    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?#&^<>])[A-Za-z\d@$!%*?#&^<>]+$/'
                    , $value)) {
                        $this->addError($field, 'The ' . $field . 'must have a lower case, an upper case, a number and a special character');
                    }
                break;
            // Add more validation rules as needed
            default:
                break;
        }
    }


    protected function addError($field, $message)
    {
        $this->errors[$field] = $message;
    }

    public function messages()
    {
        $message =[];
       if (!$this->validate($this->rules)) {
          
          $errors = $this->getErrors();
          foreach ($errors as $field => $messages) {
            $message[$field] = $messages;
          }
       }
       return $message;
    }

    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }
}

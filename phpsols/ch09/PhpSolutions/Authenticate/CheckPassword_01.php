<?php
namespace PhpSolutions\Authenticate;

class CheckPassword {

    protected $password;
    protected $minimumChars;
    protected $mixedCase = false;
    protected $minimumNumbers = 0;
    protected $minimumSymbols = 0;
    protected $errors = [];

    public function __construct($password, $minimumChars = 8) {
        $this->password = $password;
        $this->minimumChars = $minimumChars;
    }

    public function check() {
        if (preg_match('/\s/', $this->password)) {
            $this->errors[] = 'Password cannot contain spaces.';
        }
        if (strlen($this->password) < $this->minimumChars) {
            $this->errors[] = "Password must be at least
                $this->minimumChars characters.";
        }
        return $this->errors ? false : true;
    }

    public function getErrors() {
        return $this->errors;
    }

}
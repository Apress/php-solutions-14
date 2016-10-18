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

    public function requireMixedCase() {
        $this->mixedCase = true;
    }

    public function requireNumbers($num = 1) {
        if (is_numeric($num) && $num > 0) {
            $this->minimumNumbers = (int) $num;
        }
    }

    public function requireSymbols($num = 1) {
        if (is_numeric($num) && $num > 0) {
            $this->minimumSymbols = (int) $num;
        }
    }

    public function check() {
        if (preg_match('/\s/', $this->password)) {
            $this->errors[] = 'Password cannot contain spaces.';
        }
        if (strlen($this->password) < $this->minimumChars) {
            $this->errors[] = "Password must be at least
                $this->minimumChars characters.";
        }
        if ($this->mixedCase) {
            $pattern = '/(?=.*[a-z])(?=.*[A-Z])/';
            if (!preg_match($pattern, $this->password)) {
                $this->errors[] = 'Password should include uppercase
                    and lowercase characters.';
            }
        }
        if ($this->minimumNumbers) {
            $pattern = '/\d/';
            $found = preg_match_all($pattern, $this->password, $matches);
            if ($found < $this->minimumNumbers) {
                $this->errors[] = "Password should include at least
                    $this->minimumNumbers number(s).";
            }
        }
        if ($this->minimumSymbols) {
            $pattern = "/[-!$%^&*(){}<>[\]'" . '"|#@:;.,?+=_\/\~]/';
            $found = preg_match_all($pattern, $this->password, $matches);
            if ($found < $this->minimumSymbols) {
                $this->errors[] = "Password should include at least
                    $this->minimumSymbols nonalphanumeric character(s).";
            }
        }
        return $this->errors ? false : true;
    }

    public function getErrors() {
        return $this->errors;
    }

}
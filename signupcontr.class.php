<?php

class Signupcontr extends Signup {
    private $uid;
    private $pwd;
    private $pwdrepeat;
    private $email;
    private $errors = array(); // Array to store errors

    public function __construct($uid, $pwd, $pwdrepeat, $email) {
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdrepeat = $pwdrepeat;
        $this->email = $email;
    }

    public function signupUser() {
        // Perform all validation checks
        $this->validateInput();

        // If there are errors, redirect with the error messages
        if (!empty($this->errors)) {
            $errorString = implode(",", $this->errors); // Join errors in a string
            header("Location: ../index.php?error=" . urlencode($errorString));
            exit();
        }

        // If no errors, set the user in the database
        $this->setUser($this->uid, $this->pwd, $this->email);
    }

    private function validateInput() {
        // Check if fields are empty
        if ($this->emptyInput()) {
            $this->errors[] = "emptyInput";
        }

        // Check for invalid username
        if ($this->invalidUid()) {
            $this->errors[] = "invalidUid";
        }

        // Check for invalid email
        if ($this->invalidEmail()) {
            $this->errors[] = "invalidEmail";
        }

        // Check if passwords match
        if (!$this->pwdMatch()) {
            $this->errors[] = "passwordMismatch";
        }

        // Check if username or email is already taken
        if (!$this->uidTakencheck()) { // This should return false if taken
            $this->errors[] = "usernameTaken";
        }
    }

    // Check if any input is empty
    private function emptyInput() {
        return empty($this->uid) || empty($this->pwd) || empty($this->pwdrepeat) || empty($this->email);
    }

    // Validate username using a regex pattern
    private function invalidUid() {
        return !preg_match("/^[a-zA-Z0-9]*$/", $this->uid);
    }

    // Validate the email address
    private function invalidEmail() {
        return !filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }

    // Check if passwords match
    private function pwdMatch() {
        return $this->pwd === $this->pwdrepeat;
    }

    // Check if the username or email is already taken
    private function uidTakencheck() {
        // Call the checkUser method from the Signup class
        return $this->checkUser($this->uid, $this->email);
    }

    
}

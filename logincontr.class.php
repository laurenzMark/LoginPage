<?php

class Logincontr extends Login {
    private $uid;
    private $pwd;
    private $errors = array(); // Array to store errors

    public function __construct($uid, $pwd) {
        $this->uid = $uid;
        $this->pwd = $pwd;
    }

    public function loginUser() {
        // Perform all validation checks
        $this->validateInput();

        // If there are errors, redirect with the error messages
        if (!empty($this->errors)) {
            $errorString = implode(",", $this->errors); // Join errors in a string
            header("Location: ../index.php?error=" . urlencode($errorString));
            exit();
        }

        // If no errors, set the user in the database
        $this->getUser($this->uid, $this->pwd);
    }

    private function validateInput() {
        // Check if fields are empty
        if ($this->emptyInput()) {
            $this->errors[] = "emptyInput";
        }
    }

    // Check if any input is empty
    private function emptyInput() {
        return empty($this->uid) || empty($this->pwd) || empty($this->pwdrepeat) || empty($this->email);
    }

    public function showUser($uid){
        $results = $this->getUserUid($uid);
        echo $results[0]['users_id'];
      }
}

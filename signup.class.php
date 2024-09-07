<?php

class Signup extends Dbh {

    public function setUser($uid, $pwd, $email) {
        $stmt = $this->connect()->prepare('INSERT INTO users(users_uid, users_pwd, users_email) 
                                           VALUES (?, ?, ?);');
        $hashPwd = password_hash($pwd, PASSWORD_DEFAULT);
        if (!$stmt->execute(array($uid, $hashPwd, $email))) {
            $stmt = null;
            header("Location: ../index.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }

    public function checkUser($uid, $email) {
        $stmt = $this->connect()->prepare('SELECT users_id FROM users WHERE users_uid = ? OR users_email = ?;');
        
        if (!$stmt->execute(array($uid, $email))) {
            $stmt = null;
            header("Location: ../index.php?error=stmtfailed");
            exit();
        }
        
        // If there are any rows, the user or email exists
        $resultCheck = null;
        if ($stmt->rowCount() > 0) {
            $resultCheck = false; // User exists
        } else {
            $resultCheck = true; // User does not exist
        }

        return $resultCheck;
    }

    
}

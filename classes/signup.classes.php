<?php 

class Signup extends Dbh {

    protected function setUser($uid, $pwd , $email) {
        $stmt = $this->connect()->prepare('INSERT INTO users (users_uid , users_pwd , users_email) VALUES (?,?,?);');
        $hashedPwd = password_hash($pwd , PASSWORD_DEFAULT);
        // $stmt->execute(array($uid,$pwd,$email));

        if(!$stmt->execute(array($uid,$hashedPwd,$email))) {
            $stmt = null;
            header("location: ../index.php?error=insert");
            exit();
        }
        $stmt = null;
    }

        protected function checkUser($uid, $email) {
        $stmt = $this->connect()->prepare('SELECT usars_id FROM users WHERE usars_id = ? OR users_email = ?;');

        if(!$stmt->execute(array($uid,$email))) {
            $stmt = null;
            header("location: ../index.php?error=select");
            exit();
        }
        $resultCheck;
        if($stmt->rowCount() > 0) {
            $resultCheck = false;

        }
        else {
            $resultCheck = true;
        }
        return $resultCheck;
    }

}
<?php 

class Login extends Dbh {

    protected function getUser($uid, $pwd) { 
        $stmt = $this->connect()->prepare('SELECT users_pwd FROM users WHERE users_uid = ? OR users_email = ? ;');

        if(!$stmt->execute(array($uid,$pwd))) {
            $stmt = null;
            header("location: ../index.php?error=insert");
            exit();
        }

        if($stmt->rowCount() == 0 ) {
            $stmt = null;
            header ("location: ../index.php?error=usernotFound" );
            exit();
        } 

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($pwd,$pwdHashed[0]["users_pwd"]);

        if($checkPassword  == false ) {
            $stmt = null;
            header ("location: ../index.php?error=wrongPassword" );
            exit();


        } elseif ($checkPassword  == true) {
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_uid = ? OR users_email = ? AND users_pwd = ?;');
        
        if(!$stmt->execute(array($uid,$id,$pwd))) {
            $stmt = null;
            header("location: ../index.php?error=stmtFailed");
            exit();
        }

        if($stmt->rowCount() == 0 ) {
            $stmt = null;
            header ("location: ../index.php?error=usernotFound" );
            exit();
        } 
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        session_start();
        $_SESSION['userid'] = $user[0]["usars_id"];
        $_SESSION['useruid'] = $user[0]["users_uid"];

    }


        $stmt = null;
    }

}
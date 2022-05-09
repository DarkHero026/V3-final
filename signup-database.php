<?php

class SignupDatabase extends Dbh
{
    protected function setUser($userid, $pwd, $email)
    {
        // Dit maak een user aan de databse.
        $stmt = $this->connect()->prepare('INSERT INTO worker (user_id, user_pwd, user_email) VALUES (?, ?, ?);'); //input statement !!!

        // password voor security
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($userid, $hashedPwd, $email))) {
            $stmt = null;
            header("location: medewerker-signup?error=stmtfailed"); //!!!
            exit();
        }

        $stmt = null;
    }


    protected function checkUser($userid, $email)
    {
        // Dit check als er een bestand gebruik al in de database.
        $stmt = $this->connect()->prepare('SELECT user_id FROM worker WHERE user_id = ? OR user_email = ?;'); //select statement !!!

        if (!$stmt->execute(array($userid, $email))) {
            $stmt = null;
            header("location: medewerker-signup?error=stmtfailed"); //!!!
            exit();
        }

        $resultCheck;
        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }

        return $resultCheck;
    }
}

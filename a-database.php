<?php

class PostA extends Dbh
{
    public function getPost() // gets all from table worker
    {
        $sql = "SELECT * FROM worker";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }

    public function editPost($id) // selects from table worker with certain id
    {
        $sql = "SELECT * FROM worker WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();

        return $result;
    }

    public function updatePost($name, $pwd, $email, $id) //update table with certain id
    {
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT); // pass is hashed because login system checks hashed pass

        $sql = "UPDATE worker SET user_id = ?, user_pwd = ?, user_email = ? WHERE id = ?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name, $hashedPwd, $email, $id]);
    }

    public function delPost($id) //delete from table worker with certain id
    {
        $sql = "DELETE FROM worker WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
}

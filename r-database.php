<?php

class PostR extends Dbh
{
    public function getPost()
    {
        $sql = "SELECT * FROM klant_r";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }

    public function getEndPost()
    {
        $sql = "SELECT * FROM klant_r ORDER BY id DESC LIMIT 1";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        while ($result = $stmt->fetchAll()) {
            return $result;
        };
    }

    public function addPost($startid, $endid, $name, $adres, $plaats, $postcode, $telefoon)
    {
        $sql = "INSERT INTO klant_r(check_in, check_out, naam, adres, plaats, postcode, telefoon) VALUES (?, ?, ?, ?, ?, ?, ?);";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$startid, $endid, $name, $adres, $plaats, $postcode, $telefoon]);
    }

    public function editPost($id)
    {
        $sql = "SELECT * FROM klant_r WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();

        return $result;
    }

    public function updatePost($startid, $endid, $name, $adres, $plaats, $postcode, $telefoon, $id)
    {
        $sql = "UPDATE klant_r SET check_in = ?, check_out = ?, naam = ?, adres = ?, plaats = ?, postcode = ?, telefoon = ? WHERE id = ?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$startid, $endid, $name, $adres, $plaats, $postcode, $telefoon, $id]);
    }

    public function delPost($id)
    {
        $sql = "DELETE FROM klant_r WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
}

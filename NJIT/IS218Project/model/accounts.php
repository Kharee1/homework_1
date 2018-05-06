<?php

{
    public static function permission($email, $password) {
        $db = Database::getDB();
        $checkDatabase = false;
        $query = 'SELECT * FROM accounts WHERE email = :email AND password = :password';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);
        $statement->execute();
        if ($info = $statement->fetchAll()) {
            $checkDatabase = true;
        }
        $statement->closeCursor();
        return $checkDatabase;
    }
    public static function pullEmail($email){
        $db = Database::getDB();
        $query = 'SELECT fname, lname FROM accounts WHERE email = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $initials = $statement->fetch();
        $statement->closeCursor();
        $name = $initials['fname'] . " " . $initials['lname'];
        return $name;
    }
    public static function pullEmail($email){
        $db = Database::getDB();
        $query = 'SELECT ownerid FROM accounts WHERE email = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $identify = $statement->fetch();
        $statement->closeCursor();
        $id = $identify['ownerid'];
        return $id;
    }
}
?>
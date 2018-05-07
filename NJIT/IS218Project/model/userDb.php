<?php
class UsersDB {
    private function __construct() {}
    public static function getUsers() {
        $peopleList = array();
        $db = Database::getDB();
        $query = 'SELECT * FROM accounts';
        $statement = $db->prepare($query);
        $statement->execute();
        $accounts = $statement->fetchAll();
        $statement->closeCursor();
        foreach($accounts as $account) {
            $list = new Users($account['id'], $account['email'], $account['fname'], $account['lname'], $account['phone'], $account['birthday'], $account['gender'], $account['password']);
            $peopleList[] = $list;
         }
        return $peopleList;
    }
}
?>
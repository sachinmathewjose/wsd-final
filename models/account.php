<?php

final class account extends \database\model
{
    public $id;
    public $email;
    public $fname;
    public $lname;
    public $phone;
    public $birthday;
    public $gender;
    public $password;
    protected static $modelName = 'account';

    public static function getTablename()
    {
        $tableName = 'accounts';
        return $tableName;    //or return 'accounts'
    }

    //add a method to compare the passwords this is where bcrypt should be done and it should return TRUE / FALSE for login
    public function setPassword($password) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        return $password;
    }

    public function checkPassword($LoginPassword) {
        return password_verify($LoginPassword, $this->password);
    }

    public function validate()
    {
        $valid = TRUE;
        /*echo 'myemail: ' . $this->email;
        if($this->email == '') {
            $valid = FALSE;
            echo 'nothing in email';
*/
        return $valid;
    }

}

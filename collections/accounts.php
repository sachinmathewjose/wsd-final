<?php

class accounts extends \database\collection
{
    protected static $modelName = 'account';

    // Return user account object from email
    public static function findUserbyEmail($email)
    {
        $tableName = get_called_class();
        $sql = 'SELECT * FROM ' . $tableName . ' WHERE email = ?';
        $recordsSet = self::getResults($sql, $email);
        if (is_null($recordsSet)) {
            return FALSE;
        } else {
            return $recordsSet[0];
        }
    }
}
?>

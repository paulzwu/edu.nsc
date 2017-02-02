<?php
//https://www.tutorialspoint.com/sqlite/sqlite_php.htm
/**
 * Created by PhpStorm.
 * User: zw251y
 * Date: 11/30/2016
 * Time: 8:12 PM
 */

class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('test.db');
    }
}
$db = new MyDB();

if(!$db){
    echo $db->lastErrorMsg();
} else {
    echo "Opened database successfully\n";
}

$sql =<<<EOF
      CREATE TABLE COMPANY
      (ID INT PRIMARY KEY     NOT NULL,
      NAME           TEXT    NOT NULL,
      AGE            INT     NOT NULL,
      ADDRESS        CHAR(50),
      SALARY         REAL);
EOF;

$ret = $db->exec($sql);
if(!$ret){
    echo $db->lastErrorMsg();
} else {
    echo "Table created successfully\n";
}
$db->close();
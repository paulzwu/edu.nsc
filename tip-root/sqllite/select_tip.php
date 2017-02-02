<?php
class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('2014-2015-TIPs.sqlite');
    }
}
$db = new MyDB();
if(!$db){
    echo $db->lastErrorMsg();
} else {
    echo "Opened database successfully<br/>";
}

$sql =<<<EOF
      SELECT * from TIP;
EOF;


$ret = $db->query($sql);
$h =0;
echo "<table>";
while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
//    echo "ID = ". $row['ID'] . "<br/>";
//    echo "NAME = ". $row['NAME'] ."<br/>";
//    echo "ADDRESS = ". $row['ADDRESS'] ."<br/>";
//    echo "SALARY =  ".$row['SALARY'] ."<br/><br/>";

    if ($h==0) {
        echo "<th>";
        foreach ($row as $key => $value) {
            print "<td>$key </td>";

        }
        echo "</th>";
        $h = 1;
    }
    if ($h==1) {
        echo "<tr>";
        foreach ($row as $key => $value) {
            print "<td>$value </td>";

        }
        echo "</tr>";
    }


}
echo "</table>";
echo "Operation done successfully<br/>";
$db->close();
?>
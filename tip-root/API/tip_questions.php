<?php
/*  David Lippman for Lumen Learning
*   List students with primary email addresses
*/

$courseid = '1058659';
$token = '9~GIgM0CkQ2tEoNcujhPXcehbCt2FhHM8N97QNCOCmQBDZDyEiQbDPYWmfTFUg8SGe';
$domain = 'canvas.northseattle.edu';

//get list of students.  Might be multiple pages long
$pagecnt = 1;
$stus = array();
$url = 'https://'.$domain.'/api/v1/courses/'.$courseid."/quizzes/2397119/questions/58971806?access_token=$token";

$f = @file_get_contents($url);
#var_dump($f);
#print($f);

$list = json_decode($f);

print "<h1> Description of TIP </h1>";

echo "<h2>API URL by Paul's Accesstoken: </h2>";
echo "$url";


echo "<p> the data retrieved </p>";

print $list->description;


?>

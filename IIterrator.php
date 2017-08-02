
<?php
$file_id = 123; // or something else you got from your MySQL database
$slug = md5($secret.$file_id);
 
echo '
<a href="http://mydomain.com/dowload.php?fid='.$slug.'">PHP download file via MySQL</a>';


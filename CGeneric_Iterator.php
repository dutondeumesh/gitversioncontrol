<?php
ignore_user_abort(true);
set_time_limit(12); 
$path = "/absolute_path_to_your_files/";
 
$secret = 'your-secret-string';
 
if (isset($_GET['fid']) && preg_match('/^([a-f0-9]{32})$/', $_GET['fid'])) {
	$db = new mysqli('localhost', 'username', 'password', 'databasename');
	$result = $db->query(sprintf("SELECT filename FROM mytable WHERE MD5(CONCAT(ID, '%s')) = '%s'", $secret, $db->real_escape_string($_GET['fid'])));
	if ($result_>num_rows == 1) {
		$obj = $result->fetch_object();
		$fullPath = $path.$obj->filename;
		if ($fd = fopen ($fullPath, "r")) {
			//
			// the other PHP download code
			//
		}
		fclose ($fd);
		exit;
	} else {
		die('no match');
	}
} else {
	die('missing file ID');
}

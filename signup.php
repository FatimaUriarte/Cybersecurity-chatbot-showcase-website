<?php

$cur_firstname=$_POST["signup-firstname"];
$cur_lastname=$_POST["signup-lastname"];
$cur_email=$_POST["signup-email"];
$cur_password=$_POST["signup-password"];
$cur_repassword=$_POST["signup-repassword"];

#CONNECT DATABASE SERVER#######################
$mysqul_host="localhost";
$mysql_user="root";
$mysql_password="root";
mysql_connect($mysql_host, $mysql_user, $mysql_password) or die ("Cannot connect to the database");

#SELECT DATABASE################################
$mysql_database="myapp";
mysql_select_db($mysql_database);

#CREATE SQL QUERY###############################
$ret_sql_query="SELECT * FROM users_data_sici WHERE email='$cur_email'";
$ret_result= mysql_query($ret_sql_query);
$total_num_rows=mysql_num_rows($ret_result);

if ($cur_password==$cur_repassword){
	if ($total_num_rows==0) {
		$insert_sql_query="INSERT INTO users_data_sici (firstname, lastname, email, password, repassword) VALUES ('$cur_firstname', '$cur_lastname', '$cur_email','$cur_password', '$cur_repassword')";
		$result = mysql_query($insert_sql_query);
		echo "<H2> Successful sign up </H2>";
	}
	else{
		echo "<H2> Email is already taken </H2>";
	}
}
else {
	echo "<H2> Passwords do not match </H2>";
}


?>
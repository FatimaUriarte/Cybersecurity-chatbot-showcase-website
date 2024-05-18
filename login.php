<?php

$cur_email=$_POST["email"];
$cur_password=$_POST["password"];

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

$ret_sql="SELECT firstname, lastname, password FROM users_data_sici WHERE email='$cur_email'";
$result= mysql_query($ret_sql);
$row=mysql_fetch_array($result);
$ret_result_firstname = $row[0];
$ret_result_lastname = $row[1];
$ret_result_password = $row[2];


if ($cur_email!='admin@admin.com'){
	if ($total_num_rows==1){
		if ($ret_result_password==$cur_password) {
			echo "<H2> Welcome Back $ret_result_firstname $ret_result_lastname </H2>";
		}
		else{
			echo "<H2> Invalid Password </H2>";
		}
	}
	else {
		echo "<H2> EmailID does not exist </H2>";
	}
}
else {
	if ($cur_password=='12345'){
		echo "<H3> List of all users: </H3>";
		$i=0;
		$ret_sql_query="SELECT * from users_data_sici";
		$ret_result= mysql_query($ret_sql_query);
		$total_num_rows=mysql_num_rows($ret_result);
		while ($i<$total_num_rows){
			$cur_row=mysql_fetch_array($ret_result);
			$cur_row_db_firstname=$cur_row["firstname"];
			$cur_row_db_lastname=$cur_row["lastname"];
			echo "$cur_row_db_firstname";
			echo " ";
			echo "$cur_row_db_lastname";
			echo "<BR>";
			$i=$i+1;
		}	
	}
	else{
		echo "<H2> Invalid Password </H2>";
	}
}


?>
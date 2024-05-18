<?php

$cur_name=$_POST["name"];
$cur_email=$_POST["email"];
$cur_message=$_POST["message"];

#CONNECT DATABASE SERVER#######################
$mysqul_host="localhost";
$mysql_user="root";
$mysql_password="root";
mysql_connect($mysql_host, $mysql_user, $mysql_password) or die ("Cannot connect to the database");

#SELECT DATABASE################################
$mysql_database="myapp";
mysql_select_db($mysql_database);

$insert_sql_query="INSERT INTO contact_data_sici (name, email, message) VALUES ('$cur_name', '$cur_email', '$cur_message')";
$result = mysql_query($insert_sql_query);
echo "<H2> Thanks! We will contact you as soon as possible  </H2>";


?>
<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "s756t371", "ieb3ohgu", "s756t371");

/* check connection */
if ($mysqli->connect_errno)
{
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$User = $_POST["Username"];
$newUser =  "INSERT INTO Users (user_id) VALUES ('$User')";

if(ctype_space($User)||$User =="")
{
  echo "Username cannot just be a space";
}

$same = "SELECT * FROM Users WHERE $User";

if($mysqli->query($same))
{
  echo "Username already exists!";
}
else
{
  if($mysqli->query($newUser)===TRUE)
  {
    echo "The username you have entered is valid: '$User'";
  }
  else
  {
    echo "Error";
  }
}
  //Close the connection
  $mysqli->close();

 ?>

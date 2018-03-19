<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "s756t371", "ieb3ohgu", "s756t371");

/* check connection */
if ($mysqli->connect_errno)
{
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$User = $_POST["Username"];
$Post = $_POST["Post"];
$Exists = "SELECT * FROM Users WHERE user_id = '$User'";
$Check = mysqli_query($mysqli, $Exists);

if(ctype_space($User)||$User =="")
{
  echo "Username cannot just be a space";
}
else if (ctype_space($Post)||$Post =="")
{
  echo "You gotta post something!";
}
else
{
    if(mysqli_num_rows($Check)>0)
    {
      $query = "INSERT INTO Posts (author_id, content) VALUES ('$User', '$Post')";
       if($mysqli->query($query)===TRUE)
          {
            echo "The post you have entered is up!: '$Post'";
          }
          else
          {
            echo "This Error";
          }
    }
    else
    {
  echo "Username doesnt exist!";
    }
}

  //Close the connection
  $mysqli->close();

 ?>

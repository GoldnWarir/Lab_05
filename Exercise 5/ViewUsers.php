<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "s756t371", "ieb3ohgu", "s756t371");

/* check connection */
if ($mysqli->connect_errno)
{
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}


  $query = "SELECT user_id From Users";
  $result = $mysqli->query($query);
  if($result->num_rows > 0)
    {
      echo "<center>List of users</center><br>";
      echo "<center><table border=5px>";
      echo  "<th>Users</th>";

      while ($row = $result->fetch_assoc())
      { echo "<tr>";
        echo "<td>".$row["user_id"]."</td>";
        echo "</tr></center>";
      }

      echo "</table>";
    }
    else
    {
      echo "This Error";
    }

  //Close the connection
  $mysqli->close();

 ?>

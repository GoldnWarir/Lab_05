<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "s756t371", "ieb3ohgu", "s756t371");

/* check connection */
if ($mysqli->connect_errno)
{
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}


  $selection = $_POST["name"];
  $query = "SELECT content From Posts Where author_id = '$selection'";
  $result = $mysqli->query($query);

  if($result->num_rows >0)
    {
      echo "<center>User's Posts</center><br>";
      echo "<center><table border=5px>";
      echo  "<th>Posts From:".$selection."</th>";

      while ($row = $result->fetch_assoc())
      { echo "<tr>";
        echo "<td>".$row["content"]."</td>";
        echo "</tr>";
      }
      echo "</center>";
    }
    else
    {
      echo "No Posts From this User";
      echo "</center>";
    }

      echo "</table>";

  //Close the connection
  $mysqli->close();

 ?>

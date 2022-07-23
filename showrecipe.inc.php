<?php

  // Make connection with the mysql database mysqlnd_ms_dump_server
  $connection = mysqli_connect("localhost","test","test")or die("Sorry, error establishing connection");

  mysqli_select_db('recipe',$connection)or die("Sorry, error establishing connection");

  //Get the recipe id from the url index.php?content=showrecipe&id=$recipeid
  $recipeid = $_GET['id'];

  //Create a query to get data record for the specific recipe_id
  $query = "SELECT title,poster,shortdesc,ingredients,directions FROM recipes WHERE recipeid = $recipeid";

  //Use php db module to retrieve data from the SQLiteDatabase
  $result = mysqli_query($query)or die("Sorry, error establishing connection");

  //Check if Empty
  $row = mysqli_fetch_array($result,MYSQL_ASSOC)or die("Sorry, no records found");

  $title = $row['title'];

  $poster = $row['poster'];

  $shortdesc = $row['shortdesc'];

  $ingredients = $row['ingredients'];

  $directions = $row['directions'];

  // we have statements in different lines in db

  $ingredients = nl2br($ingredients);

  $directions = nl2br($directions);

  //Display html and contents

  echo "<h2>$title</h2>\n";

  echo "by $poster<br><br>\n";

  echo "$shortdesc<br><br>\n";

  echo "<h3>ingredients</h3><br><br>\n";

  echo "$ingredients<br><br>\n";

  echo "<h3>Directions</h3><br><br>\n";

  echo "$directions<br><br>\n";

  //Create # comments posted , Add a comment link and print recipe link

  //Query to count the number of comments for the specific recipe id
  $query = "SELECT count(commentid) from comments WHERE recipeid = $recipeid";

  $result = mysqli_query($query);

  //no need for mysql_assoc because we know $result only has a number
  $row = mysqli_fetch_array($result);

  //Check if number returned is 0, if yes then no comments
  if($row[0]==0){
    echo "No Comments &nbsp;&nbsp;\n";

    echo "<a href = \"index.php?content=newcomment&id=$recipeid\">Add a comment</a>&nbsp;&nbsp;"

    echo "<a href = \"print.php?id=$recipeid\" target=\"_blank\">Print recipe</a>\n"

    echo "<hr>\n";
  }else {
    echo $row[0]. "\n";

    echo "&nbsp;comments posted.&nbsp;&nbsp;\n";

    echo "<a href = \"index.php?content=newcomment&id=$recipeid\">Add a comment</a>&nbsp;&nbsp;"

    echo "<a href = \"print.php?id=$recipeid\" target=\"_blank\">Print recipe</a>\n"

    echo "<hr>\n";

    echo "<h2>Comments</h2>\n";

    $query = SELECT date, poster, comment from comments WHERE recipeid=$recipeid order by commentid desc;

    $result = mysqli_query($query) or die("Error retrieving comments");

    while($row = mysqli_fetch_array($result,MYSQL_ASSOC)){

        $date = $row['date'];

        $poster = $row['poster'];

        $comment = $row['comment'];

        $comment = nl2br($comment);

        echo $date."- posted by $poster<br>\n";

        echo "$comment<br>\n";

        echo "<br><br>\n";
    }




  }
?>

/*This page is shows the latest recipes in the site. This is the default content if $content is not set to be either login,register or newrecipe
refer nav.inc.php links*/

<h2 class="tag-line">The Latest Recipes</h2>

<?php
  // Connect to MySQL db in localhost server using user account created
   // in the db which only has QUERY privileges, done for security reasons
  $connection = mysqli_connect("localhost","test","test") or die('Sorry, error
  establishing connection with the database');

  mysqli_select_db('recipe',$connection)or die('Sorry, error establishing
  connection with the database');

  // Get the data record values from recipes tables and order it in latest recipes at top
  $query = "SELECT recipeid,title,poster,shortdesc FROM recipes ORDER BY recipeid desc limit 0,5";

  //php variable $result will hold all the returned query results
  $result = mysqli_query($query) or die("Sorry, error establishing connection with the database");

 //Check for contents in $result and if exist, retrieve to an array display the row entries to webpage
  if(mysqli_num_rows($result)== 0){
    echo "<h3>Sorry, there are no entries. Please try later";
  }else {
    while($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
     $recipeid = $row['recipeid'] ;
     $title = $row['title'];
     $poster = $row['poster'] ;
     $shortdesc = $row['shortdesc'] ;

     //create link for headline
     echo "<a href=\"index.php?content=showrecipe&id=$recipeid\">$title</a>submitted by $poster<br>\n";

     echo "$shortdesc<br><br>\n";
    }
  }
 ?>

<hr style="color:orange;opacity:0.3;width:6%;margin:0 auto;border:8px dotted;border-style:none none dotted;"><br>
<h2 class="tag-line" style="text-align:center;">Post Recipe</h2><br>
<?php $recipeid=$_GET['id'];

echo "<form action=\"index.php\" method=\"post\">";

echo "<p>Comments :</p> <br>";

echo "<textarea name =\"comment\" rows = \"10\" cols = \"80\"></textarea><br><br>";


 echo "<p>Submitted by :</p> <input type=\"text\" name=\"poster\" size = \"40\"><br><br>";

  echo "<input type = \"submit\" value = \"Post Comment\" style = \"
            background-color: orange;
            font-size:18px;
            border: none;
            text-decoration: none;
            color: white;
            padding: 10px 10px;
            \">";

  echo "<input type =\"hidden\" value = \"$recipeid\" name = \"recipeid\">\n";
   echo "<input type = \"hidden\" value = \"addcomment\" name = \"content\">";

echo "</form>";
?>

<?php
  include_once 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

    <!--Here we display the search results on a search page-->
    <h1>Search page</h1>
    <h2>Your search results:</h2>
    <div class="article-container">
      <?php
        if (isset($_POST['submit'])) {
          //You NEED to use prepared statements when connecting to the database, to make the search form secure! I didn't do that in the video, however we will do it here together!
          //If you are confused about prepared statements, please watch episode 40 in the PHP playlist and learn it first.

          //Here we get the search input
          $search = $_POST['search'];

          //Here we use the keyword "LIKE" in our query and we wrap the $search variable in "%", instead of setting the column name equal to our variable like we usually do. This is because we need to check if the keyword matches PART of the database data, and isn't 100% identical to the data.

          //ALSO remember that we are using prepared statements, meaning that for now, we will use "?" as a placeholder for $search!
          $sql = "SELECT * FROM article WHERE article_title LIKE '%?%' OR article_text LIKE '%?%' OR article_author LIKE '%?%' OR article_date LIKE '%?%'";

          //Here we start the prepared statement
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
        		echo "SQL error";
        	} else {
        		//Here we assign our data to the prepared statement, and replace our placeholders with $search
        		mysqli_stmt_bind_param($stmt, "ssss", $search, $search, $search, $search);
        		//Then we execute the statement!
        		mysqli_stmt_execute($stmt);
            //Here we get the number of results we got from the search!
        		$result = mysqli_stmt_get_result($stmt);
            $resultCount = mysqli_num_rows($result);

            if ($resultCount > 0) {
              echo "There are ".$resultCount." results!";

              while ($row = mysqli_fetch_assoc($result)) {
                //Here we output the search results!
                //We could also add a link around the result if we want to. This link would take the user to the full article. Notice that we create a unique link, where we carry the information regarding which article it is, to the next page.
                echo "<a href='article.php?title=".$row[article_title]."&date=".$row[article_date]."'>";
                  echo "<div class='article-box'>";
                    echo "<h3>".$row[article_title]."</h3>";
                    echo "<p>".$row[article_text]."</p>";
                    echo "<p>".$row[article_date]."</p>";
                    echo "<p>".$row[article_author]."</p>";
                  echo "</div>";
                echo "</a>";
              }
            }
        	}
        }
      ?>
    </div>

  </body>
</html>

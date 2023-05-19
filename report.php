<!DOCTYPE html>
<html lang="en">

<head> 
  <meta charset="UTF-8"/>
  <meta name="description"  content="FYP"/>
  <meta name="keywords"   content=" Swinburne"/>
  <meta name="author"   content="Lum Wai Keen"/>
  <title>FYP</title>
</head>

<?php 
    session_start();
?>

<body>

  <form id="sign_data" method="post" action="report.php">
    <header>
      <h2 id = "first_H" ><strong>Summary Report</strong></h2>
    </header>
    <fieldset>
      <legend id = "PDs" class = "legend">Search Rider's NRIC</legend>
        <p id="searchFunction" class="questions">
          <label for = "search" ><input id = "search" class = "answer" type="text" name="search" required = "required" pattern = "^[0-9]{0,20}$" placeholder="Enter NRIC"/><input id="searchButton" type="submit" value="Search" /></label><br><br><br><br>
        </p>

        <?php

          //Check IF searched
          if(isset($_POST["search"]))
          {
            $searchedID = $_POST["search"];

            require_once('settings.php');
            $conn = @mysqli_connect($host,$user,$pwd,$sql_db);

            if (!$conn) {
            echo "<p>Database connection failure $host, $user, $pwd, $sql_db</p>";  
            } 
            else {

			/*Dispatch Table*/

              $sql_table = "dispatch";
              $query = "select * from $sql_table where dispatch_nric = $searchedID";
              $result = @mysqli_query($conn,$query); 

              if($result)
              {
                echo"<fieldset>";
                echo "<legend id = \"PDs\" class = \"legend\">Dispatch's Information</legend>";
                if(mysqli_num_rows ( $result ) == 0)
                {
                  echo"<p class = \"result\">None of the NRIC is $searchedID.</p>";

                }
                else
                {
                  echo"<table border = \"1\">\n";
                  echo"<tr>\n"
                  ."<th scope = \"col\">Dispatch's NRIC</th>\n "
                  ."<th scope = \"col\">Dispatch;s Name</th>\n "
                  ."<th scope = \"col\">Dispatch's Phone No.</th>\n "
                  ."<th scope = \"col\">Organization's Name</th>\n "
                  ."</tr>\n";

                  while ($row = mysqli_fetch_assoc($result)) 
                  {
                    echo"<tr>\n ";
                    echo"<td>",$row["dispatch_nric"],"</td>\n ";
                    echo"<td>",$row["dispatch_name"],"</td>\n ";
                    echo"<td>",$row["dispatch_phone_no"],"</td>\n ";
                    echo"<td>",$row["organization_name"],"</td>\n ";
                    echo"</tr>\n ";
                  }
                  echo"</table>\n";               
                }
                echo "</fieldset>";
              }
			  
			  /*Title Table*/
			  
			  $sql_table = "titles";
              $query = "select * from $sql_table where dispatch_ic = $searchedID";
              $result = @mysqli_query($conn,$query); 

              if($result)
              {
                echo"<fieldset>";
                echo "<legend id = \"PDs\" class = \"legend\">Title's Information</legend>";
                if(mysqli_num_rows ( $result ) == 0)
                {
                  echo"<p class = \"result\">None of the NRIC is $searchedID.</p>";

                }
                else
                {
                  echo"<table border = \"1\">\n";
                  echo"<tr>\n"
                  ."<th scope = \"col\">Title's ID</th>\n "
                  ."<th scope = \"col\">Title's Name</th>\n "
                  ."<th scope = \"col\">Document's Name </th>\n "
                  ."<th scope = \"col\">Date Collected</th>\n "
				  ."<th scope = \"col\">Dispatch's NRIC</th>\n "
                  ."</tr>\n";

                  while ($row = mysqli_fetch_assoc($result)) 
                  {
                    echo"<tr>\n ";
                    echo"<td>",$row["title_id"],"</td>\n ";
                    echo"<td>",$row["title_name"],"</td>\n ";
                    echo"<td>",$row["document_name"],"</td>\n ";
                    echo"<td>",$row["date_collected"],"</td>\n ";
					echo"<td>",$row["dispatch_ic"],"</td>\n ";
                    echo"</tr>\n ";
                  }
                  echo"</table>\n";               
                }
                echo "</fieldset>";
              }
			  
			  /*Visit Purpose Table*/
			  
			  $sql_table = "visit_purpose";
              $query = "select * from $sql_table where dispatch_ic = $searchedID";
              $result = @mysqli_query($conn,$query); 

              if($result)
              {
                echo"<fieldset>";
                echo "<legend id = \"PDs\" class = \"legend\">Purpose of Visit</legend>";
                if(mysqli_num_rows ( $result ) == 0)
                {
                  echo"<p class = \"result\">None of the NRIC is $searchedID.</p>";

                }
                else
                {
                  echo"<table border = \"1\">\n";
                  echo"<tr>\n"
                  ."<th scope = \"col\">Developer's Name</th>\n "
                  ."<th scope = \"col\">Remarks</th>\n "
                  ."<th scope = \"col\">Dispatch's NRIC</th>\n "
                  ."</tr>\n";

                  while ($row = mysqli_fetch_assoc($result)) 
                  {
                    echo"<tr>\n ";
                    echo"<td>",$row["developer_name"],"</td>\n ";
                    echo"<td>",$row["remarks"],"</td>\n ";
					echo"<td>",$row["dispatch_ic"],"</td>\n ";
                    echo"</tr>\n ";
                  }
                  echo"</table>\n";               
                }
                echo "</fieldset>";
              }
			  
            }
          }
        ?>

      
    </fieldset>
  </form>

</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head> 
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FYP</title>

  <!-- Bootstrap5 -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->

  <link rel="stylesheet" href="styles/report.css">


</head>

<?php session_start(); ?>

<body>
  <div class="container">
  <header>
      <img src="images/logo.png" alt="Logo" width="180px" height="180px">
  </header>
    <h1 id="first_H" ><strong>Summary Report</strong></h1>
      <form id="sign_data" method="post" action="report_page_function.php">
        <fieldset>
          <legend id = "PDs" class = "legend">Search Rider's NRIC</legend>
            <input id = "search" class = "answer" type="text" name="search" required = "required" pattern = "^[0-9]{0,20}$" minlength="12" maxlength="12" placeholder="Enter NRIC"/>
            <button type="submit" class="searchBtn">Search</button>
            

              
      
      <?php //Check IF searched

if (isset($_POST["search"])) {
        $searchedID = $_POST["search"];

        require_once "database.php";

        if (!$conn) {
          echo "<p>Database connection failure $host, $user, $pwd, $sql_db</p>";
        } else {
          /*Dispatch Table*/

          $sql_table = "dispatch";
          $query = "select * from $sql_table where dispatch_nric = $searchedID";
          $result = @mysqli_query($conn, $query);

          if ($result) {
            echo "<fieldset>";
            echo "<legend id = \"PDs\" class = \"legend\">Dispatch's Information</legend>";
            if (mysqli_num_rows($result) == 0) {
              echo "<p class = \"result\">None of the NRIC is $searchedID.</p>";
            } else {
              echo "<table class=\"table\" border = \"1\">\n";
              echo "<tr>\n" .
                "<th scope = \"col\">Dispatch's NRIC</th>\n " .
                "<th scope = \"col\">Dispatch's Name</th>\n " .
                "<th scope = \"col\">Dispatch's Phone No</th>\n " .
                "<th scope = \"col\">Organization's Name</th>\n " .
                "</tr>\n";

              $queryJoin = "SELECT tb_image.image FROM tb_image, dispatch WHERE dispatch.id=tb_image.id AND dispatch.dispatch_nric='$searchedID'";
              $result2 = @mysqli_query($conn, $queryJoin);
              $row = mysqli_fetch_array($result2);
              $imagepath = $row["image"];
              if ($result2) {
                echo "<img src='img/$imagepath' width='300' height='200'>";
              }

              while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>\n ";
                echo "<td>", $row["dispatch_nric"], "</td>\n ";
                echo "<td>", $row["dispatch_name"], "</td>\n ";
                echo "<td>", $row["dispatch_phone_no"], "</td>\n ";
                echo "<td>", $row["organization_name"], "</td>\n ";

                echo "</tr>\n ";
              }
              echo "</table>\n";
            }
            echo "</fieldset>";
          }

          /*Title Table*/

          $sql_table = "titles";
          $query = "select * from $sql_table where dispatch_ic = $searchedID";
          $result = @mysqli_query($conn, $query);

          if ($result) {
            echo "<fieldset>";
            echo "<legend id = \"PDs\" class = \"legend\">Title's Information</legend>";
            if (mysqli_num_rows($result) == 0) {
              echo "<p class = \"result\">None of the NRIC is $searchedID.</p>";
            } else {
              echo "<table border = \"1\">\n";
              echo "<tr>\n" .
                "<th scope = \"col\">Title's ID</th>\n " .
                "<th scope = \"col\">Title's Name</th>\n " .
                "<th scope = \"col\">Document's Name </th>\n " .
                "<th scope = \"col\">Date Collected</th>\n " .
                "<th scope = \"col\">Dispatch's NRIC</th>\n " .
                "</tr>\n";

              while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>\n ";
                echo "<td>", $row["title_id"], "</td>\n ";
                echo "<td>", $row["title_name"], "</td>\n ";
                echo "<td>", $row["document_name"], "</td>\n ";
                echo "<td>", $row["date_collected"], "</td>\n ";
                echo "<td>", $row["dispatch_ic"], "</td>\n ";
                echo "</tr>\n ";
              }
              echo "</table>\n";
            }
            echo "</fieldset>";
          }

          /*Visit Purpose Table*/

          $sql_table = "visit_purpose";
          $query = "select * from $sql_table where dispatch_ic = $searchedID";
          $result = @mysqli_query($conn, $query);

          if ($result) {
            echo "<fieldset>";
            echo "<legend id = \"PDs\" class = \"legend\">Purpose of Visit</legend>";
            if (mysqli_num_rows($result) == 0) {
              echo "<p class = \"result\">None of the NRIC is $searchedID.</p>";
            } else {
              echo "<table border = \"1\">\n";
              echo "<tr>\n" .
                "<th scope = \"col\">Developer's Name</th>\n " .
                "<th scope = \"col\">Remarks</th>\n " .
                "<th scope = \"col\">Dispatch's NRIC</th>\n " .
                "</tr>\n";

              while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>\n ";
                echo "<td>", $row["developer_name"], "</td>\n ";
                echo "<td>", $row["remarks"], "</td>\n ";
                echo "<td>", $row["dispatch_ic"], "</td>\n ";
                echo "</tr>\n ";
              }
              echo "</table>\n";
            }
            echo "</fieldset>";
          }
        }
      } ?>

      
</fieldset>
</form>
</div>



</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>E-Title-Collection-System</title>

  <!-- CSS -->
  <link rel="stylesheet" href="styles/main.css">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;800&display=swap" rel="stylesheet">



  <script defer src="/E-TITLE-COLLECTION-SYSTEM/scripts/main.js"></script>
</head>

<?php
session_start();

if (isset($_SESSION["MessageThatComeFromLoginProcessPage"])) {
  $message = $_SESSION["MessageThatComeFromLoginProcessPage"];
  echo '<script>alert("' . $message . '")</script>';
  unset($_SESSION["MessageThatComeFromLoginProcessPage"]);
}

if (isset($_SESSION["MessageThatComeFromPurposePage"])) {
  $message = $_SESSION["MessageThatComeFromPurposePage"];
  echo '<script>alert("' . $message . '")</script>';
  unset($_SESSION["MessageThatComeFromPurposePage"]);
}
?>

<body>
  <div class="container">
    <header class="header">
      <a href="main_page.php" style="display:block;width:180px"><img src="images/logo.png" alt="Logo" width="180px" height="180px"></a>
    </header>
    <main class="links">
      <a href="login_page.php" target="_blank"><button>ADMIN LOGIN</button></a>
      <a href="dispatchRegister.php" target="_blank"><button>DISPATCH REGISTER</button></a>
      <a href="dispatchLogin.php" target="_blank"><button>DISPATCH LOGIN</button></a>
      <a href="dispatchSearch.php" target="_blank"><button>DISPATCH SEARCH</button></a>
      <a href="purpose_page.php" target="_blank"><button>PURPOSE OF VISIT</button></a>
      <a href="report_page_function.php" target="_blank"><button>SUMMARY REPORT</button></a>
    </main>

    </div>
  </body>
  
</html>
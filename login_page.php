<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login Page</title>

    <!-- CSS -->
    <link rel="stylesheet" href="styles/login.css">


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;800&display=swap" rel="stylesheet">


    <!-- JS -->
    <script src="/E-TITLE-COLLECTION-SYSTEM/scripts/loginPage.js"></script>
  </head>
  
  <?php
  session_start();

  // Detect input
  if (isset($_SESSION["MessageThatComeFromLoginProcessPage"])) {
    $message = $_SESSION["MessageThatComeFromLoginProcessPage"];
    echo '<script>alert("' . $message . '")</script>';
    unset($_SESSION["MessageThatComeFromLoginProcessPage"]);
  }
  ?>

<body>
    <div class="container">
    <header>
      <img src="images/logo.png" alt="Logo" width="170px" height="170px">
    </header>


    <div class="registerTitle">
      <h1>Login Form</h1>
      <p>Please login to continue</p>
    </div>
    
    <hr />


      <form id="sign_data" method="post" action="login_function.php">

          <label for="username"><b>Username</b></label>
          <input
            id="username"
            type="text"
            placeholder="Enter username"
            name="username"
            required
          />
          
          <hr />
            
          <label for="password"><b>Password</b></label>
          <input
            id="password"
            type="password"
            placeholder="Enter password"
            name="password"
            required
          />

          <hr />

            
          <button type="submit" class="loginBtn">LOGIN</button>
      </form>

    </div>

  </body>
</html>
    
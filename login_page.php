<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>

    <!-- <link
      rel="stylesheet"
      href="/E-TITLE-COLLECTION-SYSTEM/styles/loginPage.css"
    /> -->
    <script src="/E-TITLE-COLLECTION-SYSTEM/scripts/loginPage.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
      body {
        font-family: Arial, Helvetica, sans-serif;
      }

      /* Full-width input fields */
      input[type="text"],
      input[type="password"] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
      }

      /* Set a style for all buttons */
      button {
        background-color: #04aa6d;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
      }

      button:hover {
        opacity: 0.8;
      }

      /* Center the image and position the close button */
      .imgcontainer {
        text-align: center;
        margin: 5px 5px;
        position: relative;
      }

      img.avatar {
        width: 22%;
        border-radius: 30%;
      }

      .container {
        padding: 10px;
      }

      span.psw {
        float: right;
        padding-top: 16px;
      }

    
      /* Change styles for span and cancel button on extra small screens */
      @media screen and (max-width: 300px) {
        span.psw {
          display: block;
          float: none;
        }
      }
    </style>
  </head>
  
  <?php

     session_start();
     
    // Detect input
    if(isset($_SESSION["MessageThatComeFromLoginProcessPage"]))
    {
      $message = $_SESSION["MessageThatComeFromLoginProcessPage"];
      echo '<script>alert("'.$message.'")</script>';
      unset($_SESSION["MessageThatComeFromLoginProcessPage"]);
    }
    
?>

  <body>
  <form id="sign_data" method="post" action="login_function.php">
    <h2>LOGIN FORM </h2>
        <div class="imgcontainer">
          <img
            src="images/logo.png"
            alt="Avatar"
            class="avatar"
          />
        </div>
		
		
		
        <div class="container">
          <label for="username"><b>USERNAME</b></label>
          <input
            id="username"
            type="text"
            placeholder="ENTER USERNAME:"
            name="username"
			required
          />

          <label for="password"><b>PASSWORD</b></label>
          <input
            id="password"
            type="password"
            placeholder="ENTER PASSWORD:"
            name="password"
            required
          />

          <button type="submit">LOGIN</button>
        </div>

        <div class="container" style="background-color: #f1f1f1"></div>
      </form>
			
    </div>
  </body>
</html>

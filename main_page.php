<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>E-Title-Collection-System</title>
    <link rel="stylesheet" href="/styles/main.css" />
    <script defer src="/E-TITLE-COLLECTION-SYSTEM/scripts/main.js"></script>
  </head>
  
  <?php
  
	session_start();
   
    if(isset($_SESSION["MessageThatComeFromLoginProcessPage"]))
    {
      $message = $_SESSION["MessageThatComeFromLoginProcessPage"];
      echo '<script>alert("'.$message.'")</script>';
      unset($_SESSION["MessageThatComeFromLoginProcessPage"]);
    }
	
	if(isset($_SESSION["MessageThatComeFromPurposePage"]))
    {
      $message = $_SESSION["MessageThatComeFromPurposePage"];
      echo '<script>alert("'.$message.'")</script>';
      unset($_SESSION["MessageThatComeFromPurposePage"]);
    }
	
	?>
	
  <body>
    <main>
      <header>
        <nav class="navbar">
          <a href="/E-TITLE-COLLECTION-SYSTEM/Main.html">
            <img
              class="brand-logo"
              src="images/logo.png"
              alt="logo"
              width="75px"
              height="90px"
            />
          </a>

          <a href="#" class="toggle-button">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
          </a>
          <div class="navbar-links">
            <ul>
              <li><a href="/E-TITLE-COLLECTION-SYSTEM/Menu.html"></a></li>
              <li>
                <a href="/E-TITLE-COLLECTION-SYSTEM/Register.html">Register</a>
              </li>
              <li>
                <a href="/E-TITLE-COLLECTION-SYSTEM/Search.html">Search</a>
              </li>
              <li>
                <a href="/E-TITLE-COLLECTION-SYSTEM/LoginPage.html">Login</a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
    </main>
  </body>
</html>

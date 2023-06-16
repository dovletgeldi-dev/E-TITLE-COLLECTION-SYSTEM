<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dispatch Login</title>

  <!-- CSS -->

  <link rel="stylesheet" href="styles/dispatchLogin.css">


  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;800&display=swap" rel="stylesheet" />


</head>

<body>
  <div class="container">

    <header>
      <a href="main_page.php" style="display:block;width:180px"><img src="images/logo.png" alt="Logo" width="180px" height="180px"></a>
    </header>


    <div class="loginTitle">
      <h1>Dispatch login page</h1>
      <p>Please login to continue</p>
    </div>

    <hr />

    <form action="dispatchLogin.php" method="post">

      <label for="dispatch_nric"><b>NRIC Number:</b></label>
      <input type="text" placeholder="YYMMDDPB###G" name="dispatch_nric" id="dispatch_nric" minlength="12" maxlength="12" required />

      <?php if (isset($_POST["login"])) {
        $dispatch_nric = $_POST["dispatch_nric"];

        require_once "database.php";
        $sql = "SELECT * FROM dispatch WHERE dispatch_nric = '$dispatch_nric'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if ($count === 1) {
          header("Location: dispatchSearch.php");
          die();
        } else {
          echo "<div class='error-msg'>This NRIC does not match</div>";
        }
      } ?>


      <hr />
      <button type="submit" value="Login" name="login" class="loginBtn">LOGIN</button>


    </form>
    <div class="registerSignIn">
      <p>
        First time dispatch? <a href="dispatchRegister.php">REGISTER</a>.
      </p>
    </div>
  </div>

</body>

</html>
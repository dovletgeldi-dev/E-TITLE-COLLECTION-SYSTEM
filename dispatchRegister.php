<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dispatch Register</title>

  <!-- CSS -->
  <link rel="stylesheet" href="styles/dispatchRegister.css">



  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;800&display=swap" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js" integrity="sha512-dQIiHSl2hr3NWKKLycPndtpbh5iaHLo6MwrXm7F0FM5e+kL2U16oE9uIwPHUl6fQBeCthiEuV/rzP3MiAB8Vfw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>




</head>

<body>
  <?php

  if (isset($_POST["submit"])) {
    $dispatch_nric = $_POST["dispatch_nric"];
    $dispatch_name = $_POST["dispatch_name"];
    $organization_name = $_POST["organization_name"];
    $dispatch_phone_no = $_POST["dispatch_phone_no"];


    $errors = array();


    if (empty($dispatch_name) or empty($organization_name) or empty($dispatch_nric) or empty($dispatch_phone_no)) {
      array_push($errors, "<script>alert('All fields are required')</script>");
    }

    require_once "database.php";
    $sql = "SELECT * FROM dispatch WHERE dispatch_nric = '$dispatch_nric'";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);

    if ($rowCount > 0) {
      array_push($errors, "<script>alert('Dispatch NRIC already exists!')</script>");
    }

    if (count($errors) > 0) {
      foreach ($errors as $error) {
        echo "<div>$error</div>";
      }
    } else {
      $sql = "INSERT INTO dispatch (dispatch_nric, dispatch_name, dispatch_phone_no, organization_name) VALUES (?, ?, ?, ?)";
      $stmt = mysqli_stmt_init($conn);
      $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
      if ($prepareStmt) {
        mysqli_stmt_bind_param($stmt, "ssss", $dispatch_nric, $dispatch_name, $dispatch_phone_no, $organization_name);
        mysqli_stmt_execute($stmt);
        header("Location: dispatchLogin.php");
        // echo "<script>alert('You registered successfully!')";
        die();
      } else {
        die("Something went wrong");
      }
    }
  }
  ?>




  <div class="container">
    <header>
      <img src="images/logo.png" alt="Logo" width="180px" height="180px">
    </header>

    <div class="registerTitle">

      <h1>First Time Registration of Dispatch</h1>
      <p>Please fill in this form if this is your first time.</p>
    </div>
    <hr />
    <form action="dispatchRegister.php" method="post">


      <label for="dispatch_nric"><b>NRIC Number:</b></label>
      <input type="text" placeholder="YYMMDDPB###G" name="dispatch_nric" id="dispatch_nric" minlength="12" maxlength="12" required />
      <hr>

      <label for="dispatch_name"><b>Name of Dispatch:</b></label>
      <input type="text" placeholder="John Doe" name="dispatch_name" id="dispatch_name" maxlength="50" required />
      <hr>

      <label for="dispatch_phone_no"><b>Telephone Number:</b></label>
      <input type="text" placeholder="60xxxxxxxxx " name="dispatch_phone_no" id="dispatch_phone_no" pattern="^(\+?6?01)[02-46-9]-*[0-9]{7}$|^(\+?6?01)[1]-*[0-9]{8}$" maxlength="11" minlength="8" required />
      <hr>

      <label for="organization_name"><b>Organization Name:</b></label>
      <input type="text" placeholder="Ler Lum Advisory Services" name="organization_name" id="organization_name" maxlength="50" required />

      <hr />


      <h3 align="center">* Take a snapshot first and then click Save Picture & Register</h3>
      <div class="picture_container">
        <div class="picture_content">
          <label>Capture live photo</label>
          <div id="my_camera"></div>
          <input type="hidden" name="captured_image_data" id="captured_image_data">

          <button type="button" class="snapshotBtn" onclick="take_snapshot();">Take Snapshot</button>
        </div>
        <div class="picture_content">
          <label>Result</label>
          <div id="results">
            <img src="https://placehold.co/400x300?text=Captured image will be shown here" />
          </div>
          <button type="button" class="submitBtn" onclick="this.disabled=true; this.value='Sending…'; saveSnap();">Save Picture & Register</button>
        </div>
      </div>
      <!-- end container -->

      <hr />

      <button type="submit" class="registerBtn" value="Register" name="submit">REGISTER</button>
    </form>




    <div class="registerSignIn">
      <p>
        Not your first time? <a href="dispatchLogin.php">SIGN IN</a>
      </p>
    </div>
  </div>


  <!-- Webcam -->

  <!-- <script type="text/javascript" src="assets/datatables.min.js"></script> -->
  <script type="text/javascript" src="assets/webcam.min.js"></script>
  <script src="scripts/dispatchRegister.js"></script>


</body>

</html>
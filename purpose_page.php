<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <!-- CSS -->
  <link rel="stylesheet" href="styles/purpose.css">


  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;800&display=swap" rel="stylesheet">


</head>
<body>
  <div class="container">

  <header>
    <a href="main_page.php" style="display:block;width:170px"><img src="images/logo.png" alt="Logo" width="170px" height="170px"></a>
  </header>

    <div class="registerTitle">
      <h1>Purpose of Visit</h1>
      <p>Please state the purpose of your visit</p>
    </div>

    <hr />

    
    <form action="purpose_function.php" method ="post">

      <label for="dispatch_nric"><b>NRIC Number:</b></label>
      <input type="text" id="dispatchic" name="dispatchic" placeholder="Dispatch NRIC:" minlength="12" maxlength="12" required><br>

      <hr />

      
      <label for="collection"><b>(A) Collection of Title</b></label><br>
      
      <input type="text" id="nameofdeveloper" name="nameofdeveloper" placeholder="Name of Developer:" minlength="1" maxlength="50" required><br>
      <input type="text" id="titleid" name="titleid" placeholder="Title's ID:" minlength="1" maxlength="10" required><br>
      <input type="text" id="titlename" name="titlename" placeholder="Title's Name:" minlength="1" maxlength="50" required><br>
      <input type="text" id="documentname" name="documentname" placeholder="Document's Name:" minlength="1" maxlength="50" required><br>

      <hr />

      
      <label for="discussion"><b>(B) General Discussion</b></label><br>
      <input type="text" id="remarks" name="remarks" placeholder="Remark:" minlength="1" maxlength="100" required><br>

      <hr />


      <button type="submit" class="submitBtn" name="submit" value="Submit">Submit</button>

    </form> 
  </div>
</body>
</html>
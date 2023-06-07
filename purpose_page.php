<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
          font-family: Arial, Helvetica, sans-serif;
          background-color: white;
        }
        
        * {
          box-sizing: border-box;
        }
        
        /* Add padding to containers */
        .container {
          padding: 16px;
          background-color: white;
        }
        
        /* Full-width input fields */
        input[type=text] {
          width: 100%;
          padding: 15px;
          margin: 5px 0 22px 0;
          display: inline-block;
          border: none;
          background: #f1f1f1;
        }
        
        input[type=text]:focus:focus {
          background-color: #ddd;
          outline: none;
        }
        
        /* Overwrite default styles of hr */
        hr {
          border: 1px solid #f1f1f1;
          margin-bottom: 25px;
        }
        
        /* Set a style for the submit button */
        .submit {
          background-color: #04AA6D;
          color: white;
          padding: 16px 20px;
          margin: 8px 0;
          border: none;
          cursor: pointer;
          width: 100%;
          opacity: 0.9;
        }
        
        .submit:hover {
          background-color: darkgreen;
          opacity: 1;
        }

        </style>
        </head>		
	
<h2>Purpose of Visit.</h2>
<p>Please state the purpose of your visit.</p>

<form action="purpose_function.php" method ="post">

  <input type="text" id="dispatchic" name="dispatchic" placeholder="Dispatch NRIC:" minlength="12" maxlength="12" required><br>
  
  <input type="checkbox" id="collection" name="c" value="Collection">
  <label for="collection"> (A)	Collection of Title</label><br>
  
  <input type="text" id="nameofdeveloper" name="nameofdeveloper" placeholder="Name of Developer:" minlength="1" maxlength="50" required><br>
  <input type="text" id="titleid" name="titleid" placeholder="Title's ID:" minlength="1" maxlength="10" required><br>
  <input type="text" id="titlename" name="titlename" placeholder="Title's Name:" minlength="1" maxlength="50" required><br>
  <input type="text" id="documentname" name="documentname" placeholder="Document's Name:" minlength="1" maxlength="50" required><br>
   
  <input type="checkbox" id="discussion" name="discussion" value="Discussion">
  <label for="discussion"> (B)	General Discussion</label><br>
  <input type="text" id="remarks" name="remarks" placeholder="Remark:" minlength="1" maxlength="100" required><br>
  <input type="submit" class="submit" name="submit" value="Submit">
</form> 
</body>
</html>
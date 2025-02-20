<?php
include("database.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form</title>
  <link rel="stylesheet" href="style.css">

</head>
<body>

<div class="form">
  
  <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">

  <h2>Welcome to Fakebook!</h2>

  username:<br>
  <input type="text" name="username"><br>

  password:<br>
  <input type="password" name="password"><br> <br>

  <input class="btn" type="submit" name="submit" value="REGISTER">

  </form>

  </div>

</body>
</html>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form</title>
</head>
<body>

<div class="msg">

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

  $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);

  $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

  if(empty($username)){
    echo"Please enter a username!";
  }
  else if(empty($password)){
    echo"Please enter a password!";
  }
  else{
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (user, password)
            VALUES ('$username', '$hash')";

    try{

      mysqli_query($conn, $sql);

      echo "You are now successfully Registered!";

    }
    catch(mysqli_sql_exception){

      echo "The username is already taken!";

    }


  }
}


mysqli_close($conn);

?>

</div>

  
</body>
</html>




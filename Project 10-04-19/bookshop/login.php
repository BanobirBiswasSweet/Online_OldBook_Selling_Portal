
<?php
  session_start();
  if(!isset($_SESSION)) {  session_start(); }
  require "./functions/database_functions.php";
  $conn = db_connect();

  if(isset($_SESSION)) {
     if(isset($_SESSION["user_id"])){
       header("location: index.php");
     }
   }

  if($_SERVER["REQUEST_METHOD"] == "POST") {


     $myusername = mysqli_real_escape_string($conn,$_POST['username']);
     $mypassword = mysqli_real_escape_string($conn,$_POST['password']);
     $pass = md5($mypassword);


     $sql = "SELECT customerid FROM users WHERE username = '$myusername' and pass = '$pass'";
     $result = mysqli_query($conn,$sql);
     $row = mysqli_fetch_array($result,MYSQLI_ASSOC);


     $count = mysqli_num_rows($result);


     if($count == 1) {
        //session_register("myusername");
        $_SESSION['user_id'] = $myusername;
        $_SESSION['cus_id'] = $row["customerid"];
        $error ="";
        header("location: index.php");
     }else {
        $error = "Username or Password is worng";
     }
  }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <style>
    .error {color: #FF0000;}
    </style>
    <meta charset="utf-8">
    <title>Login</title>


    <title>Sign up</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="css/loginStyle.css" />

  </head>


  <body>

    <div class="container">
      <h1>Login</h1><br>
      <span class = "error"> <?php if(isset($error)) echo $error;?></span>
      <img src="images/log_img.jpg">
      <form method="POST">
        <div>

          <label for="u">User name</label>

          <input type="text" class="form-control" id="u" name="username"placeholder="User name"  required>
        </div>
        <div>
         <label for="inputPassword">Password</label>
         <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password" required>
       </div><br>
        <a href="signup.php">Don't have an account yet! Sign up</a><br><br>
        <button type="submit" class="btn btn-primary">Submit</button>

      </form>
    </div>

  </body>

</html>

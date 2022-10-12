<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $title; ?></title>

    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="./bootstrap/css/jumbotron.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Bookstore</a>
        </div>


        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">

              <li><a href="publisher_list.php"><span class="glyphicon glyphicon-paperclip"></span>&nbsp; Publisher</a></li>

              <li><a href="books.php"><span class="glyphicon glyphicon-book"></span>&nbsp;Latest Books</a></li>

              <li><a href="contact.php"><span class="glyphicon glyphicon-phone-alt"></span>&nbsp; Contact</a></li>

              <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp; My Cart</a></li>
              <?php if( ! isset( $_SESSION["user_id"]) ) { ?>
              <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>&nbsp; Sign in</a></li>
              <?php } ?>
              <?php if( isset( $_SESSION["user_id"]) ) { ?>
              <li><a href="purchase_his.php"><span class="glyphicon glyphicon-tasks"></span>&nbsp; Purchase History</a></li>
              <?php } ?>
              <?php if( isset( $_SESSION["user_id"]) ) { ?>
              <li><a href="empty_session.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp; logout</a></li>
              <?php } ?>
              
              <li><a>

                 <form class="form-inline" action="search.php">
                   <input class="form-control mr-sm-2" type="search" name="name" placeholder="Search" aria-label="Search">
                   <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><span class="ionicons ion-ios-search-strong"></span>&nbsp;</button>
                 </form>

               </a>


             </li>

            </ul>
        </div>
      </div>
    </nav>
    <?php
      if(isset($title) && $title == "Index") {
    ?>

    <div class="jumbotron">
      <div class="container">
        <h1>Welcome to online bookstore</h1>
      </div>
    </div>
    <?php } ?>

    <div class="container" id="main">

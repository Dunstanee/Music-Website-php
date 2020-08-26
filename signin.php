<?php
/**
 * database.php *
 * Database access *
 * @category   Music
 * @package    Music We
 * @author     Mike
 * @copyright  2020 Mike
 * @version    1.0
 */
 include "sessions.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
  <title>World-Music</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="CSS/css/bootstrap.min.css">
  </head>
  <body>
    <section class="sticky-top"  style="background-color:rgb(240, 14, 14)">


    <div class="container " id="menu-nav">
      <nav class="navbar navbar-expand-lg " style=" ">
        <a class="navbar-brand"  style="font-size:24px;font-weight:bold;color:#ffff;">247-Music</a>
        <button class="navbar-toggler" style="" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon" ></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">

            <a class="nav-item nav-link active" href="Songs" style="font-size:18px; color:#ffff; opacity:1;" >Home</a>
            <a class="nav-item nav-link active" href="Search" style="font-size:18px; color:#ffff; opacity:1;" >Search</a>
        </div>
        </div>
      </nav>
    </div>
    </section >
  <div class="container" style="margin-top:5%;">
    <div class="row">
    <div class="col-lg-3">

    </div>
    <div class="col-lg-6" style="background-color:rgb(240, 14, 14); padding: 30px;border-radius:3em;">

        <form method="post" enctype="multipart/form-data" autocomplete="off">
          <div class="form-group">
            <label for="username" style="color:white;">User Name</label>
            <input type="text" width="200" name="username" class="form-control" id="exampleInputText" placeholder="Enter Username" required>
          </div>
          <div class="form-group">
            <label for="password" style="color:white;">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
          </div>

          <button type="submit" name="login" class="btn btn-primary" style="width:100%;">Submit</button>
        </form>

    </div>
    <div class="col-lg-3">

    </div>
    </div>

</div>
</section>

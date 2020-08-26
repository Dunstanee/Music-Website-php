<?php include "sessions.php"; ?>
<section class="sticky-top"  style="background-color:rgb(240, 14, 14)">


<div class="container " id="menu-nav">
  <nav class="navbar navbar-expand-lg " style=" ">
    <a class="navbar-brand"  style="font-size:24px;background-color:#a30707;padding:10px; border-radius:1em;font-family: Georgia, 'Times New Roman', Times, serif;font-weight:bold;color:#ffff;">World-Music</a>
    <button class="navbar-toggler" style="" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon" ></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarNavAltMarkup" >
      <div class="navbar-nav ">

        <a class="nav-item nav-link active" href="Songs" style="font-size:18px;font-family: Georgia, 'Times New Roman', Times, serif; color:#ffff; opacity:1;" >Home</a>
        <a class="nav-item nav-link active" href="Search" style="font-size:18px; font-family: Georgia, 'Times New Roman', Times, serif;color:#ffff; opacity:1;" >Search</a>
        <?php
        if(!isset($_SESSION["MEMBER_ID"])){
          ?>
  <a class="nav-item nav-link active" href="signin" style="font-size:18px;font-family: Georgia, 'Times New Roman', Times, serif; color:#ffff; opacity:1;">Sign In</a>
          <?php
        }else{
          ?>
            <a class="nav-item nav-link active" href="Playlist" style="font-size:18px;font-family: Georgia, 'Times New Roman', Times, serif; color:#ffff; opacity:1;">playlist</a>
<a class="nav-item nav-link active" href="logout.php" style="font-size:18px;font-family: Georgia, 'Times New Roman', Times, serif; color:#ffff; opacity:1;">Sign Out</a>
          <?php
        }
         ?>


      </div>
    </div>
  <img src="images/avatar.png" style="width:50px; height:50px;" alt="">
    <div class="form-inline">
      <?php
if(!isset($_SESSION["MEMBER_ID"])){
 ?>

<?php } else{
  ?>
  <label style="color:#ffff; font-family: Georgia, 'Times New Roman', Times, serif;">User Name: <?php echo $_SESSION["USERNAME"]; ?></label>

  <label style="color:#ffff; font-family: Georgia, 'Times New Roman', Times, serif;margin-left:2%;">Membership: <?php echo $_SESSION["CATEGORY"]; ?></label>

  <?php
}?>
    </div>
  </nav>
</div>
</section >

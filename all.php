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
 include "conn.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>247 Music</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="CSS/css/bootstrap.min.css">
  </head>
  <body>

    <?php include "header.php";
    ?>

<section>
        <div class="container"  >
          <div class="row"  >
              <div class="col-lg-2" >
                <h5 style="margin-top: 3%; text-align:center; font-size:35px;">Others</h5>
                  <hr>
                <?php include "leftsidebar.php"; ?>
              </div>
        <div class="col-lg-7" style="background-color:#696400;">
          <div style="background-color:#333100; margin-bottom: 10px;margin-top: 10px; padding:10px;">
            <h5 style="margin-top: 3%; text-align:center;color:#ffff; font-size:18px;">Song Lists</h5>
              <hr>
          </div>

          <?php
          include "conn.php";
          ?>
          <?php
          if (isset ($_REQUEST['title']))
          {
            $title_name=$_REQUEST['title'];
            if($title_name == "artist"){
            $tracks=mysqli_query($dbConn,"SELECT * FROM track ");
                while($all_track=mysqli_fetch_array($tracks)){
          ?>
          <div class="card mb-3 cards"  style="width:100%; border-style:none;background-color:#fffdd0;">
          <div class="row no-gutters" style="">
          <div class="col-md-4" >
       <?php
       $Album_id=$all_track["album_id"];
       $getAlbum=mysqli_query($dbConn,"SELECT * FROM album WHERE album_id='$Album_id' ");
       $Album_thumble=mysqli_fetch_array($getAlbum);
        ?>



       <img src="images/<?php echo $Album_thumble["thumble"]; ?>.png" class="card-img" alt="..." style="width:150px;height:100px;">
     </div>
     <div class="col-md-8">
     <div class="card-body">
         <?php
          if(!isset($_SESSION["MEMBER_ID"] )){

          }else{
            ?>
            <div class="float-right">
              <form class=""  method="post" enctype="multipart/form-data">
               <input type="hidden" name="trackid" value="<?php echo $all_track["track_id"]; ?>">
               <input class="btn bg-danger" style="color:white;" type="submit" name="addplaylist" value="Add to Playlist">
             </form>
           </div>
            <?php
          }
          ?>
         <h5 class="card-title"><a href="play.php?track=<?php echo $all_track["track_id"]; ?>"><?php echo $all_track["track_title"]; ?></a></h5>
         <p class="card-text">Track Length: <?php echo $all_track["track_length"]; ?></p>
       </div>
       </div>

       </div>
       </div>
       <hr>
<?php }
}else if($title_name == "album"){
  $albums=mysqli_query($dbConn,"SELECT * FROM album ");
      while($all_albums=mysqli_fetch_array($albums)){
  ?>
  <div class="card mb-3 cards"  style="width:100%; border-style:none;background-color:#fffdd0;">
  <div class="row no-gutters" style="">
  <div class="col-md-4" >


 <img src="images/<?php echo $all_albums["thumble"]; ?>.png" class="card-img" alt="..." style="width:150px;height:100px;">
</div>
<div class="col-md-8">
<div class="card-body">
<h5 class="card-title"><?php echo $all_albums["album_name"]; ?></a></h5>
</div>
</div>

</div>
</div>
<hr>
  <?php

}
}
}?>
</div>
<div class="col-lg-3" >
  <h5 style="margin-top: 3%; text-align:center; font-size:35px;">Available Albums</h5>

<?php include "rightbar.php"; ?>
</div>
  </div>
  </div>
</section>


    <?php include "footer.php" ?>

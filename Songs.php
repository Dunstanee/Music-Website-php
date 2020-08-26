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
    <title>World-Music</title>
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

              </div>
        <div class="col-lg-7" style="background-color:#d80505;">
          <div style="background-color:#a30707; margin-bottom: 10px;margin-top: 10px;">
            <h5 style="margin-top: 3%; text-align:center; color:#ffff; font-size:18px;padding:10px;">My Music</h5>
              <hr>
          </div>

          <?php
                $getTrack=mysqli_query($dbConn,"SELECT * FROM track ");
                while($trackMusic=mysqli_fetch_array($getTrack)){
          ?>
          <div class="card mb-3 cards"  style="width:100%; border-style:none;background-color:#ffff;">
          <div class="row no-gutters" style="">
          <div class="col-md-4" >
       <?php
       $Albumid=$trackMusic["album_id"];
       $geTAlbum=mysqli_query($dbConn,"SELECT * FROM album WHERE album_id='$Albumid' ");
       $Album_tracks=mysqli_fetch_array($geTAlbum);
        ?>

       <img src="<?php echo $Album_tracks["thumble"]; ?>" class="card-img" alt="..." style="width:150px;height:100px;">
     </div>
     <div class="col-md-8">
     <div class="card-body">
         <?php
          if(!isset($_SESSION["MEMBER_ID"] )){

          }else{
            ?>
            <div class="float-right">
              <form class=""  method="post" enctype="multipart/form-data">
               <input type="hidden" name="trackid" value="<?php echo $trackMusic["track_id"]; ?>">
               <input class="btn bg-danger" style="color:white;" type="submit" name="addplaylist" value="Add to Playlist">
             </form>
           </div>
            <?php
          }
          ?>
         <h5 class="card-title" style="font-family: Georgia, 'Times New Roman', Times, serif;"><a href="play.php?track=<?php echo $trackMusic["track_id"]; ?>"><?php echo $trackMusic["track_title"]; ?></a></h5>
         <p class="card-text">Track Length: <?php echo $trackMusic["track_length"]; ?></p>
       </div>
       </div>

       </div>
       </div>
       <hr>
<?php } ?>
</div>
<div class="col-lg-3" >
  <h5 style="margin-top: 3%; text-align:center; font-size:35px; font-family: Georgia, 'Times New Roman', Times, serif;">Available Albums</h5>
    <hr>
<?php include "rightbar.php"; ?>
</div>
  </div>
  </div>
</section>


    <?php include "footer.php" ?>

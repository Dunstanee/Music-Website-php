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
                <h5 style="margin-top: 3%; text-align:center; font-size:35px;font-family: Georgia, 'Times New Roman', Times, serif;">PlayList Available
                </h5>
                  <hr>

                <?php include "leftplaylist.php"; ?>
              </div>
        <div class="col-lg-7" style="background-color:#a30707;">
          <?php
                $member_ID = $_SESSION["MEMBER_ID"];
                $playlist = "SELECT * FROM memberPlaylist WHERE member_id='$member_ID'";
                $executed = mysqli_query($dbConn,$playlist);
                $playlist_data = mysqli_fetch_assoc($executed);
                if($playlist_data != null){
                $playlist_ID = $playlist_data["playlist_id"];

                  $confirm_playlist =mysqli_query($dbConn, "SELECT * FROM playlist WHERE playlist_id='$playlist_ID'");
                $playlist_confirm =mysqli_num_rows($confirm_playlist);
                if($playlist_confirm == 0){
                  ?>
                  <center>
                    <h5 style="margin-top: 3%; text-align:center; color:#ffff;font-size:16px;">No Track Playlist Available</h5>
                  </center>
                    <?php
                  }else{
                    ?>
                    <center>
                      <h5 style="margin-top: 3%; text-align:center; color:#ffff;font-size:24px;font-family: Georgia, 'Times New Roman', Times, serif;">My Track List</h5>
                    </center>
                    <?php

                    $memberID = $_SESSION["MEMBER_ID"];
                    $getmemberplay= mysqli_fetch_assoc(mysqli_query($dbConn,"SELECT * FROM memberPlaylist WHERE member_id='$memberID'"));
                    $getplaylistID = $getmemberplay["playlist_id"];

                    $tracks = mysqli_query($dbConn,"SELECT * FROM playlist WHERE playlist_id='$getplaylistID'");
                    while( $trackdatas=mysqli_fetch_assoc($tracks)){
                    $trackID = $trackdatas["track_id"];
                    $get_track = mysqli_query($dbConn,"SELECT * FROM track WHERE track_id='$trackID'");
                    while($track=mysqli_fetch_array($get_track)){
                    ?>
                    <div class="card mb-3 cards"  style="width:100%; border-style:none;background-color:#ffff;">
                    <div class="row no-gutters" style="">
                    <div class="col-md-4" >
                 <?php
                 $Albumid=$track["album_id"];
                 $get_Album=mysqli_query($dbConn,"SELECT * FROM album WHERE album_id='$Albumid' ");
                 $Albumtracks=mysqli_fetch_array($get_Album);
                  ?>

                 <img src="<?php echo $Albumtracks["thumble"]; ?>" class="card-img" alt="..." style="width:150px;height:100px;">
               </div>
               <div class="col-md-8">
               <div class="card-body">

                      <div class="float-right">
                      <a class="" href="play.php?track=<?php echo $track["track_id"]; ?>">   <img src="images/play.png" class="card-img" alt="..." style="width:50px;height:50px;"></a>
                     </div>

                   <h5 class="card-title" style="font-family: Georgia, 'Times New Roman', Times, serif;"><?php echo $track["track_title"]; ?></h5>
                   <p class="card-text">Track Length: <?php echo $track["track_length"]; ?></p>
                 </div>
                 </div>

                 </div>
                 </div>
                 <hr>
          <?php
        }
      }
    }
}
                     ?>
</div>
<div class="col-lg-3" >
  <h5 style="margin-top: 3%; text-align:center; font-size:18px;">Available Albums</h5>
    <hr>
<?php include "rightbar.php"; ?>
</div>
  </div>
  </div>
</section>


    <?php include "footer.php" ?>

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
    if(isset($_POST["addplaylist"])) {
$memberid= $_SESSION["MEMBER_ID"];
  $trackMusicid = $_POST['trackid'];

  $get_playid = mysqli_query($dbConn,"SELECT * FROM memberPlaylist WHERE member_id='$memberid'");  // sql query
  $PLAYID = mysqli_fetch_assoc($get_playid);
  $play_list_id= $PLAYID["playlist_id"];

  // INSERT INTO THE PLAYLIST THE TRACK SELECTED
  $Insert_Track_Playlist = mysqli_query($dbConn,"INSERT INTO playlist VALUES(0,'$play_list_id' ,'$trackMusicid')");

}
$result_track = 0;
    ?>

<section>
        <div class="container"  >
          <div class="row"  >
              <div class="col-lg-2" >

              </div>
        <div class="col-lg-7" style="background-color:#a30707;">
          <div style="background-color:#ffff; margin-bottom: 10px;margin-top: 5px;border-radius: 0.5em; padding:2px;">
              <nav class="navbar navbar-light ">
                <form name="form1" class="form-inline" method="post"  enctype="multipart/form-data" >
                  <input class="form-control mr-sm-4"  name="searchtext"type="search" placeholder="Search for Track/Artist" aria-label="Search" required>
                  <img src="images/search.png" style="width:50px; height:50px;" alt="">
                  <input  type="submit" name="submit" onsubmit="required()" value="Search" style="border:none; border-radius:1em;padding:0.5em;">

                </form>
              </nav>
          </div>



                        <?php
                        if(isset($_POST["submit"])) {
                        // form variable to local
                        $result_track = 0;
                        $search = $_POST['searchtext'];
                        $sql = "SELECT * FROM track WHERE track_title LIKE '%$search%'"; // sql query
                        $result = mysqli_query($dbConn,$sql); // do query
                        $result_track = mysqli_num_rows($result);
                        while($trackMusic=mysqli_fetch_array($result)){
                        ?>
                        <div class="card mb-3 cards"  style="width:100%; border-style:none;background-color:#ffff;">
                        <div class="row no-gutters" style="">
                        <div class="col-md-4" >
                        <?php
                        $Albumid=$trackMusic["album_id"];
                        $get_Album=mysqli_query($dbConn,"SELECT * FROM album WHERE album_id='$Albumid' ");
                        $Albumtracks=mysqli_fetch_array($get_Album);
                        ?>

                        <img src="<?php echo $Albumtracks["thumble"]; ?>" class="card-img" alt="..." style="width:150px;height:100px;">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                        <?php
                        if(!isset($_SESSION["MEMBER_ID"] )){
                        ?>

                        <?php
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

                        <h5 class="card-title"><a href="play.php?track=<?php echo $trackMusic["track_id"]; ?>"> <?php echo $trackMusic["track_title"]; ?></a></h5>
                        <label class="card-text">Track Length: <?php echo $trackMusic["track_length"]; ?></label>

                        </div>
                        </div>

                        </div>
                        </div>
                        <hr>
                        <?php } }?>


                        <?php
                        if($result_track == 0){
                        ?>
                        <h5 style="margin-top: 3%; text-align:center; font-size:12px;">No results Found</h5>
                        <?php
                        }else{
                        ?>
                        <h5 style="margin-top: 3%; text-align:center; font-family:italic;color:#ffff; font-size:12px;"><?php echo $result_track; ?> results Found</h5>
                        <?php
                        }
                        ?>

                        <!-- /////////////////////////////////////////////////////////////////////////////// -->

        </div>
        <div class="col-lg-3" >
          <h5 style="margin-top: 3%; text-align:center; font-size:35px;">Available Albums</h5>
          <hr>
          <?php include "rightbar.php"; ?>
        </div>
      </div>
    </div>
</section>


    <?php include "footer.php" ?>

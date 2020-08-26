<?php
if(!isset($_SESSION["MEMBER_ID"])) {
  echo "<script>
 location.href='Search';
  </script>";
}



 ?>



<section>
  <?php
  if(isset($_POST["play_name"])) {

    $name = $_POST['playname'];
    $memberid= $_SESSION["MEMBER_ID"];

    $sql = "INSERT INTO memberPlaylist VALUES(0,'$memberid','$name')"; // sql query
    $result = mysqli_query($dbConn,$sql); // do query
  } ?>
  <div class="container" style="margin-top:15%;">
    <h6>Your Playlist</h6>
    <hr>
    <?php
          $member_ID = $_SESSION["MEMBER_ID"];
          $playlist = "SELECT * FROM memberPlaylist WHERE member_id='$member_ID'";
          $executed = mysqli_query($dbConn,$playlist);
          $playlist_total =mysqli_num_rows($executed);
          if($playlist_total == 0){
            ?>
            <form   method="post" enctype=" multipart/form-data " autocomplete="off">
                   <div class="form-group">

                         <input style="margin:10px;" type="text" name="playname" class="form-control" id="formGroupExampleInput" placeholder="Playlist Name">
                         <input style="margin:10px; color:white;" type="submit" class="btn bg-danger" name="play_name" value="ADD">
                   </div>

                 </form>
            <?php
          }else{
          while($get_playlist = mysqli_fetch_assoc($executed)){
            ?>
            <p><?php echo $get_playlist["playlist_name"]; ?> </p>

            <?php
          }
        }
            ?>
          </div>
</section>

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
// if(isset($_POST["submit"])) {
//  // form variable to local
//    $search = $_POST['searchtext'];
//
//    // make query
//    //$sql = "SELECT * FROM $tbl_name WHERE (username='$search' OR verified='$search')"; // sql query
//    $sql = "SELECT * FROM track WHERE track_title LIKE '%$search%'"; // sql query
//    $result = mysql_query($dbConn,$sql); // do query
//  }
include "conn.php";
?>
<?php
if (isset ($_REQUEST['track']))
{
  $ch=$_REQUEST['track'];

$date=date("Y-m-d");
$query=mysqli_query($dbConn,"SELECT * FROM track WHERE track_id='$ch'");
$result = mysqli_fetch_array($query);
$song_title =$result["track_title"];
$song_length = $result["track_length"];
$song_id= $result["artist_id"];
$song = $result["spotify_track"];
$query1=mysqli_query($dbConn,"SELECT * FROM artist WHERE artist_id='$song_id'");
$result1 = mysqli_fetch_array($query1);
$song_thumble =$result1["thumble"];


}


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
            <div class="container" style="background-image:url('images/music.png')" >
            <div class="row"  >
            <div class="col-lg-2" >


            </div>
            <div class="col-lg-7" style="background-color:#a30707; display:inline-flex; padding:20px;">

                <iframe src="https://open.spotify.com/embed/track/<?php echo $song?>" width="300" height="380" frameborder="0" allowtransparency="true" allow="encryptedmedia"></iframe>
                <div style="padding:20px;">
                  <img src="<?php echo $song_thumble ?>" width="200" height="150" alt="">
                  <p style="color:#ffff">Song Title : <?php echo $song_title ?> </p>
                  <p style="color:#ffff">Duration: <?php echo $song_length ?> </p>

                </div>

            </div>
            <div class="col-lg-3" >


            </div>
            </div>
            </div>
            </section>










    <?php include "footer.php" ?>
    <!-- <div class="container">
      <div class="embed-responsive embed-responsive-21by9" width="300" height="380">
    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" width="300" height="380" frameborder="0" allowtransparency="true" allow="encryptedmedia"></iframe>
  </div> -->
      <!-- <iframe src="https://open.spotify.com/embed/track/##########" width="300" height="380" frameborder="0" allowtransparency="true" allow="encryptedmedia"></iframe>  -->
    <!-- </div> -->

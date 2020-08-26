<section>
  <div class="container" style="background-color:#d80505;">
      <ul class="nav flex-column" >
    <?php
//GET ALL ALBUM FILE NAME FROM THE DATABASE
    $albumquery=mysqli_query($dbConn,"SELECT * FROM album ");
  while($Album=mysqli_fetch_array($albumquery)){
     ?>
     <li class="nav-item" style="border-bottom:1px solid grey;">
       <a class="nav-link active"  style="color:#ffff;font-style: italic;"><?php echo $Album["album_name"]; ?></a>
     </li>

<?php } ?>
  </ul>
  </div>

</section>

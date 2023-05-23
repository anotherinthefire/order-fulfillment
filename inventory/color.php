<!DOCTYPE html>
<html lang="en">
<?php
include("../includes/check-pages.php");
checkLoginStatus();
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AXGG | Color</title>
  <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
  <link rel="stylesheet" href="./css/color.css">
</head>

<body>
  <?php include('../includes/sidenav.php') ?>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu'></i>
      <span class="text">Colors</span>
    </div>

    <?php
    include('../config.php');

    $sql = "SELECT * FROM color";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
      $colorID = $row['color_id'];
      $colorName = $row['color'];
      $colorValue = $row['color'];

      if ($colorName !== 'n/a') {
        echo '
        <a href="color-view.php?color_id=' . $colorID . '" style="color:black;">
        <div class="card" style="display: inline-block; margin-right: 10px;">
          <div style="background-color: ' . $colorValue . '; width: 100%; height: 20vh;"></div>
          <div class="container">
            <h4><b>' . $colorName . '</b></h4>
          </div>
        </div>
      </a>';
      }
    }

    mysqli_close($conn);
    ?>

    <div class="card" onclick="showModal()">
      <img src="../includes/img/logo.png" alt="Avatar" style="width: 100%; background-color: black;">
      <div class="container">
        <h4><b>Add Color</b></h4>
      </div>
    </div>

    <div class="modal" id="myModal">
      <div class="modal-content" style="width: 35%; background-color:transparent;">
        <form class="form" onsubmit="addColor(event)">
          <p class="heading">Color</p>
          <input id="colorInput" class="input" placeholder="Enter color" type="text">
          <button class="btn" type="submit">Add</button>
        </form>
      </div>
    </div>


  </section>
  <script src="../assets/js/nav.js"></script>
  <script src="./js/color.js">
  </script>
</body>

</html>
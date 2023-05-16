<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AXGG | Color</title>
  <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />

  <style>
    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      transition: 0.3s;
      width: 20vh;
      margin-bottom: 2vh;
      margin-left: 2vh;
    }

    .card:hover {
      box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }

    .container {
      padding: 2px 16px;
    }
  </style>
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

    // Display colors and their names
    while ($row = mysqli_fetch_assoc($result)) {
      $colorName = $row['color'];
      $colorValue = $row['color'];
      echo '
    <div class="card" style="display: inline-block; margin-right: 10px;">
      <div style="background-color: ' . $colorValue . '; width: 100%; height: 20vh;"></div>
        <div class="container">
          <h4><b>' . $colorName . '</b></h4>
      </div>
    </div>';
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
    <div class="card">
      <img src="../includes/img/logo.png" alt="Avatar" style="width:100%; background-color: black;">
      <div class="container">
        <h4><b>Add Color</b></h4>

      </div>
    </div>



  </section>
  <script src="../assets/js/nav.js"></script>
</body>

</html>
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
  <title>AXGG | Size</title>
  <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
  <link rel="stylesheet" href="./css/size.css">
</head>

<body>
  <?php include('../includes/sidenav.php') ?>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu'></i>
      <span class="text">Size</span>
    </div>
    <div class="container">
      <?php
      function displaySizes()
      {
        include('../config.php');
        $sql = "SELECT size.size, COUNT(stock.size_id) AS stock_count
          FROM size
          LEFT JOIN stock ON size.size_id = stock.size_id
          GROUP BY size.size_id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
          $sizeName = $row['size'];
          $stockCount = $row['stock_count'];
          if ($sizeName == 'n/a') {
            continue;
          }
          $sizeDisplayName = '';
          switch ($sizeName) {
            case 'S':
              $sizeDisplayName = 'Small';
              break;
            case 'M':
              $sizeDisplayName = 'Medium';
              break;
            case 'L':
              $sizeDisplayName = 'Large';
              break;
            case 'XL':
              $sizeDisplayName = 'Extra Large';
              break;
            case 'XXL':
              $sizeDisplayName = 'Double Extra Large';
              break;
            case 'XXXL':
              $sizeDisplayName = 'Triple Extra Large';
              break;
            default:
              $sizeDisplayName = $sizeName;
          }
          echo '
            <div class="card">
                <div class="card-details">
                    <p class="text-title">' . $sizeDisplayName . '</p>
                    <p class="text-body">There are ' . $stockCount . ' ' . $sizeDisplayName . ' products</p>
                </div>
                <button class="card-button" onclick="redirectToColorView(\'' . $sizeName . '\')">View</button>
            </div>';
        }
        mysqli_close($conn);
      }
      displaySizes();
      ?>

      <div class="card" onclick="showModal()">
        <div class="card-details">
          <p class="text-title">+ Add Size</p>
          <p class="text-body">Effortlessly enhance our store with new size options</p>
        </div>
      </div>
    </div>

    <div class="modal" id="myModal">
      <div class="modal-content" style="background-color: transparent;">
        <div class="card1">
          <span class="card__title">Size</span>
          <p class="card__content">Effortlessly enhance our store with new size options.</p>
          <div class="card__form">
            <input placeholder="new size" type="text">
            <button class="sign-up">Add</button>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="../assets/js/nav.js"></script>
  <script src="./js/size.js"></script>
</body>

</html>
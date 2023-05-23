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
  <title>AXGG | User</title>
  <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <link rel="stylesheet" href="./css/user.css">
</head>

<body>
  <?php include('../includes/sidenav.php') ?>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu'></i>
      <span class="text">Users</span>
    </div>
    
    <div class="container">
      <?php
      include('../config.php');
      function getUsers()
      {
        global $conn;
        $sql = "SELECT u.*, COUNT(o.ord_id) AS number_of_orders 
                FROM user u
                LEFT JOIN orders o ON u.user_id = o.user_id
                GROUP BY u.user_id";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
      }

      $users = getUsers();

      foreach ($users as $user) {
        $fullname = $user['fullname'];
        $status = $user['status'];
        $numberOfOrders = $user['number_of_orders'];
        $statusLabel = '';

        if ($status == 0) {
          $statusLabel = 'Unverified';
        } elseif ($status == 1) {
          $statusLabel = 'Verified';
        } elseif ($status == 2) {
          $statusLabel = 'Banned';
        }
      ?>

        <a href="user-view.php">
          <div class="flip-card">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <p class="title"><?php echo $fullname; ?></p>
                <p><?php echo $statusLabel; ?></p>
              </div>
              <div class="flip-card-back">
                <p class="title">Total Order</p>
                <p><?php echo $numberOfOrders; ?></p>
              </div>
            </div>
          </div>
        </a>

      <?php
      }
      ?>

    </div>

  </section>
  <script src="../assets/js/nav.js"></script>
</body>

</html>
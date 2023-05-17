<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AXGG | User</title>
  <style>
    .container {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    .flip-card {
      background-color: transparent;
      width: 190px;
      height: 20vh;
      perspective: 1000px;
      font-family: sans-serif;
    }

    .title {
      font-size: 1.5em;
      font-weight: 900;
      text-align: center;
      margin: 0;
    }

    .flip-card-inner {
      position: relative;
      width: 100%;
      height: 100%;
      text-align: center;
      transition: transform 0.8s;
      transform-style: preserve-3d;
    }

    .flip-card:hover .flip-card-inner {
      transform: rotateY(180deg);
    }

    .flip-card-front,
    .flip-card-back {
      box-shadow: 0 8px 14px 0 rgba(0, 0, 0, 0.2);
      position: absolute;
      display: flex;
      flex-direction: column;
      justify-content: center;
      width: 100%;
      height: 100%;
      -webkit-backface-visibility: hidden;
      backface-visibility: hidden;
      border: 1px solid #5876CE;
      border-radius: 1rem;
    }

    .flip-card-front {
      background: #404759;
      color: white;
    }

    .flip-card-back {
      background: #5876CE;
      color: white;
      transform: rotateY(180deg);
    }
  </style>
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

    // Set the status label based on the user's status value
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
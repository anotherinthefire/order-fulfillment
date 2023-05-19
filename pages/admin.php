<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AXGG | Admin</title>
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
      <span class="text">Admins</span>
    </div>

    <div class="container">
    <?php
    include('../config.php');

    function getAdminInfo($conn) {
        $sql = "SELECT * FROM admin";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $fullname = $row['name'];
                $status = $row['user_level'];
                $email = $row['email'];
                $contact = $row['contact'];

                if ($status == 'Admin') {
                    $statusLabel = 'Admin';
                } else {
                    $statusLabel = 'User';
                }

                echo '<a href="user-view.php">';
                echo '<div class="flip-card">';
                echo '<div class="flip-card-inner">';
                echo '<div class="flip-card-front">';
                echo '<p class="title">' . $fullname . '</p>';
                echo '<p>' . $statusLabel . '</p>';
                echo '</div>';
                echo '<div class="flip-card-back">';
                echo '<p class="title"> contact </p>';
                echo '<p>' . $contact . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</a>';
            }
        } else {
            echo "No admin records found.";
        }
    }

    // Call the function to display admin info
    getAdminInfo($conn);
    ?>
</div>



  </section>
  <script src="../assets/js/nav.js"></script>
</body>

</html>
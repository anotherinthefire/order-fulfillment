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
  <title>AXGG | Admin</title>
  <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <link rel="stylesheet" href="./css/admin.css">
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

      function getAdminInfo($conn)
      {
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
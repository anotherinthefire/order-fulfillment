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
  <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
  <title>AXGG | Shipped</title>
  <link rel="stylesheet" href="./css/shipped.css">
</head>

<body>
  <?php include('../includes/sidenav.php') ?>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu'></i>
      <span class="text">Shipped orders</span>
    </div>
    <?php
    include('../config.php');
    function redirectToPage($orderId)
    {
      $targetPage = 'pending-view.php?id=' . $orderId;
      header('Location: ' . $targetPage);
      exit();
    }

    $perPage = 10;
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $offset = ($page - 1) * $perPage;

    if (isset($_GET['search']) && !empty($_GET['search'])) {
      $search = $_GET['search'];
      $sql = "SELECT * FROM orders WHERE status = 5 AND (full_name LIKE '%$search%' OR contact LIKE '%$search%') ORDER BY ord_date DESC LIMIT $offset, $perPage";
    } else {
      $sql = "SELECT * FROM orders WHERE status = 5 ORDER BY ord_date DESC LIMIT $offset, $perPage";
    }

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      echo '
  <div class="input-container" style="margin-left: 80%; margin-bottom:20px;">
    <form action="" method="GET">
      <input type="text" name="search" class="input" placeholder="Search..." value="' . (isset($_GET['search']) ? $_GET['search'] : '') . '">
      <button style="position:absolute; padding-top:30px;">
        <span class="icon"> 
          <svg width="19px" height="19px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
              <path opacity="1" d="M14 5H20" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
              <path opacity="1" d="M14 8H17" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
              <path d="M21 11.5C21 16.75 16.75 21 11.5 21C6.25 21 2 16.75 2 11.5C2 6.25 6.25 2 11.5 2" stroke="#000" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
              <path opacity="1" d="M22 22L20 20" stroke="#000" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </g>
          </svg>
        </span>
      </button>
    </form>
  </div>
    
    <table>
      <thead>
        <tr>
          <th>Order ID</th>
          <th>Full Name</th>
          <th>Contact</th>
          <th>Total</th>
          <th>Payment Method</th>
          <th>Order Date</th>
          <th>Action</th>
        </tr>
      </thead>
    <tbody>';

      while ($row = mysqli_fetch_assoc($result)) {
        $orderId = $row['ord_id'];
        $fullName = $row['full_name'];
        $contact = $row['contact'];
        $total = $row['total'];
        $payment = $row['mop'];
        $orderDate = $row['ord_date'];

        echo '<tr>
                <td>' . $orderId . '</td>
                <td>' . $fullName . '</td>
                <td>' . $contact . '</td>
                <td>' . $total . '</td>
                <td>' . $payment . '</td>
                <td>' . $orderDate . '</td>
                <td>
                  <button class="action-button">Action</button>
                  <div class="more-options">
                    <!-- Additional options content goes here -->
                    <form action="./actions/to-completed.php" method="post">
                      <input type="hidden" name="orderId" value="' . $orderId . '">
                      <button type="submit" name="completed" class="status">Completed</button>
                    </form>
                    <a href="shipped-view.php?id=' . $orderId . '"><button class="view">View</button></a>
                  </div>
                </td>
              </tr>';
      }

      echo '</tbody>
    </table>';

      $totalOrders = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM orders WHERE status = 5"));
      $totalPages = ceil($totalOrders / $perPage);

      echo '<div class="pagination">';
      if ($page > 1) {
        echo '<a href="?page=' . ($page - 1) . '">&laquo; Previous</a>';
      }
      for ($i = 1; $i <= $totalPages; $i++) {
        echo '<a href="?page=' . $i . '" ' . ($page == $i ? 'class="active"' : '') . '>' . $i . '</a>';
      }

      if ($page < $totalPages) {
        echo '<a href="?page=' . ($page + 1) . '">Next &raquo;</a>';
      }

      echo '</div>';
    } else {
      echo 'No orders found.';
    }

    mysqli_close($conn);
    ?>

  </section>
  <script src="../assets/js/nav.js"></script>
  <script src="./js/shipped.js"></script>
</body>

</html>
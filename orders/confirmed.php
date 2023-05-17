<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
  <title>AXGG | Confirmed</title>
  <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
      text-align: center;
    }

    td,
    th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
      text-align: center;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }

    /* Pagination Styles */
    .pagination {
      margin-top: 20px;
      text-align: center;
    }

    .pagination a {
      display: inline-block;
      padding: 8px 16px;
      text-decoration: none;
      color: #000;
      border: 1px solid #ddd;
      margin-right: 5px;
    }

    .pagination a.active {
      background-color: #ddd;
    }

    .pagination a:hover {
      background-color: #f1f1f1;
    }

    /* Action Button Styles */
    .action-button {
      padding: 8px 16px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .action-button:hover {
      background-color: #45a049;
    }

    .action-button:focus {
      outline: none;
    }

    /* More Options Button Styles */
    .action-button {
      padding: 8px 16px;
      background-color: #ccc;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .action-button:hover {
      background-color: #999;
    }

    .action-button:focus {
      outline: none;
    }

    /* More Options Content Styles */
    .more-options {
      display: none;
      padding: 10px;
    }

    .more-options button {
      border: transparent;
    }

    .more-options .status {
      background-color: #A5F297;
      padding: 5px;
      border-radius: 5px;
    }

    .more-options .view {
      background-color: #5876CE;
      border-radius: 5px;
      padding: 5px;
    }

    .more-options.show {
      display: block;
    }

    .input-container {
      width: 220px;
      position: relative;
    }

    .icon {
      position: absolute;
      right: 10px;
      top: calc(50% + 5px);
      transform: translateY(calc(-50% - 5px));
    }

    .input {
      width: 100%;
      height: 40px;
      padding: 10px;
      transition: .2s linear;
      border: 2.5px solid black;
      font-size: 14px;
      text-transform: uppercase;
      letter-spacing: 2px;
    }

    .input:focus {
      outline: none;
      border: 0.5px solid black;
      box-shadow: -5px -5px 0px black;
    }

    .input-container:hover>.icon {
      animation: anim 1s linear infinite;
    }

    @keyframes anim {

      0%,
      100% {
        transform: translateY(calc(-50% - 5px)) scale(1);
      }

      50% {
        transform: translateY(calc(-50% - 5px)) scale(1.1);
      }
    }
  </style>
</head>

<body>
  <?php include('../includes/sidenav.php') ?>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu'></i>
      <span class="text">Confirmed Orders</span>
    </div>

    <?php
    include('../config.php');

    function redirectToPage($orderId)
    {
      // Perform any necessary logic to determine the target page URL based on the order ID
      $targetPage = 'pending-view.php?id=' . $orderId;

      // Redirect the user to the target page
      header('Location: ' . $targetPage);
      exit(); // Important: Terminate the current script to prevent further execution
    }

    $perPage = 10;
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $offset = ($page - 1) * $perPage;

    // Check if a search query is submitted
    if (isset($_GET['search']) && !empty($_GET['search'])) {
      $search = $_GET['search'];
      $sql = "SELECT * FROM orders WHERE status = 2 AND (full_name LIKE '%$search%' OR contact LIKE '%$search%') ORDER BY ord_date DESC LIMIT $offset, $perPage";
    } else {
      $sql = "SELECT * FROM orders WHERE status = 2 ORDER BY ord_date DESC LIMIT $offset, $perPage";
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
          <form action="./actions/to-paid.php" method="post">
            <input type="hidden" name="orderId" value="' . $orderId . '">
            <button type="submit" name="paid" class="status">Paid</button>
          </form>
          <a href="pending-view.php?id=' . $orderId . '"><button class="view">View</button></a>
        </div>
      </td>
    </tr>';
      }

      echo '</tbody>
    </table>';

      $totalOrders = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM orders WHERE status = 2"));
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
  <script>
    // Get all action buttons in the table
    var actionButtons = document.getElementsByClassName('action-button');

    // Attach click event listeners to the action buttons
    for (var i = 0; i < actionButtons.length; i++) {
      actionButtons[i].addEventListener('click', toggleMoreOptions);
    }

    // Function to toggle the visibility of more options
    function toggleMoreOptions() {
      var moreOptions = this.nextElementSibling;
      moreOptions.classList.toggle('show');
    }
  </script>
</body>

</html>
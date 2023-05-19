<!DOCTYPE html>
<?php 
include('../config.php');
?>
<!-- Coding by CodingNepal | www.codingnepalweb.com -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> </title>
  <link rel="stylesheet" href="style.css">
  <!-- Boxiocns CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- latest bootstrap cdn -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <!-- font-awesome cdn -->
  <script src="https://kit.fontawesome.com/3481525a72.js" crossorigin="anonymous"></script>

  <!-- jquery datatable css cdn -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
</head>
<style>
  /* Google Fonts Import Link */
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');


  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }

  .sidebar {
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    width: 260px;
    background: #11101d;
    z-index: 100;
    transition: all 0.5s ease;
  }

  .sidebar.close {
    width: 78px;
  }

  .sidebar .logo-details {
    height: 60px;
    width: 100%;
    display: flex;
    align-items: center;
  }

  .sidebar .logo-details i {
    font-size: 30px;
    color: #fff;
    height: 50px;
    min-width: 78px;
    text-align: center;
    line-height: 50px;
  }

  .sidebar .logo-details .logo_name {
    font-size: 22px;
    color: #fff;
    font-weight: 600;
    transition: 0.3s ease;
    transition-delay: 0.1s;
  }

  .sidebar.close .logo-details .logo_name {
    transition-delay: 0s;
    opacity: 0;
    pointer-events: none;
  }

  .sidebar .nav-links {
    height: 100%;
    padding: 30px 0 150px 0;
    overflow: auto;
  }

  .sidebar.close .nav-links {
    overflow: visible;
  }

  .sidebar .nav-links::-webkit-scrollbar {
    display: none;
  }

  .sidebar .nav-links li {
    position: relative;
    list-style: none;
    transition: all 0.4s ease;
  }

  .sidebar .nav-links li:hover {
    background: #1d1b31;
  }

  .sidebar .nav-links li .iocn-link {
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .sidebar.close .nav-links li .iocn-link {
    display: block
  }

  .sidebar .nav-links li i {
    height: 50px;
    min-width: 78px;
    text-align: center;
    line-height: 50px;
    color: #fff;
    font-size: 20px;
    cursor: pointer;
    transition: all 0.3s ease;
  }

  .sidebar .nav-links li.showMenu i.arrow {
    transform: rotate(-180deg);
  }

  .sidebar.close .nav-links i.arrow {
    display: none;
  }

  .sidebar .nav-links li a {
    display: flex;
    align-items: center;
    text-decoration: none;
  }

  .sidebar .nav-links li a .link_name {
    font-size: 18px;
    font-weight: 400;
    color: #fff;
    transition: all 0.4s ease;
  }

  .sidebar.close .nav-links li a .link_name {
    opacity: 0;
    pointer-events: none;
  }

  .sidebar .nav-links li .sub-menu {
    padding: 6px 6px 14px 80px;
    margin-top: -10px;
    background: #1d1b31;
    display: none;
  }

  .sidebar .nav-links li.showMenu .sub-menu {
    display: block;
  }

  .sidebar .nav-links li .sub-menu a {
    color: #fff;
    font-size: 15px;
    padding: 5px 0;
    white-space: nowrap;
    opacity: 0.6;
    transition: all 0.3s ease;
  }

  .sidebar .nav-links li .sub-menu a:hover {
    opacity: 1;
  }

  .sidebar.close .nav-links li .sub-menu {
    position: absolute;
    left: 100%;
    top: -10px;
    margin-top: 0;
    padding: 10px 20px;
    border-radius: 0 6px 6px 0;
    opacity: 0;
    display: block;
    pointer-events: none;
    transition: 0s;
  }

  .sidebar.close .nav-links li:hover .sub-menu {
    top: 0;
    opacity: 1;
    pointer-events: auto;
    transition: all 0.4s ease;
  }

  .sidebar .nav-links li .sub-menu .link_name {
    display: none;
  }

  .sidebar.close .nav-links li .sub-menu .link_name {
    font-size: 18px;
    opacity: 1;
    display: block;
  }

  .sidebar .nav-links li .sub-menu.blank {
    opacity: 1;
    pointer-events: auto;
    padding: 3px 20px 6px 16px;
    opacity: 0;
    pointer-events: none;
  }

  .sidebar .nav-links li:hover .sub-menu.blank {
    top: 50%;
    transform: translateY(-50%);
  }

  .sidebar .profile-details {
    position: fixed;
    bottom: 0;
    width: 260px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #1d1b31;
    padding: 12px 0;
    transition: all 0.5s ease;
  }

  .sidebar.close .profile-details {
    background: none;
  }

  .sidebar.close .profile-details {
    width: 78px;
  }

  .sidebar .profile-details .profile-content {
    display: flex;
    align-items: center;
  }

  .sidebar .profile-details img {
    height: 52px;
    width: 52px;
    object-fit: cover;
    border-radius: 16px;
    margin: 0 14px 0 12px;
    background: #1d1b31;
    transition: all 0.5s ease;
  }

  .sidebar.close .profile-details img {
    padding: 10px;
  }

  .sidebar .profile-details .profile_name,
  .sidebar .profile-details .job {
    color: #fff;
    font-size: 18px;
    font-weight: 500;
    white-space: nowrap;
  }

  .sidebar.close .profile-details i,
  .sidebar.close .profile-details .profile_name,
  .sidebar.close .profile-details .job {
    display: none;
  }

  .sidebar .profile-details .job {
    font-size: 12px;
  }

  .home-section {
    position: relative;
    height: 100vh;
    left: 260px;
    width: calc(100% - 260px);
    transition: all 0.5s ease;
  }

  .sidebar.close~.home-section {
    left: 78px;
    width: calc(100% - 78px);
  }

  .home-section .home-content {
    height: 60px;
    display: flex;
    align-items: center;
  }

  .home-section .home-content .bx-menu,
  .home-section .home-content .text {
    color: #11101d;
    font-size: 35px;
  }

  .home-section .home-content .bx-menu {
    margin: 0 15px;
    cursor: pointer;
  }

  .home-section .home-content .text {
    font-size: 26px;
    font-weight: 600;
  }

  @media (max-width: 400px) {
    .sidebar.close .nav-links li .sub-menu {
      display: none;
    }

    .sidebar {
      width: 78px;
    }

    .sidebar.close {
      width: 0;
    }

    .home-section {
      left: 78px;
      width: calc(100% - 78px);
      z-index: 100;
    }

    .sidebar.close~.home-section {
      width: 100%;
      left: 0;
    }
  }
</style>

<body>
  <?php include('../config.php'); ?>
  <div class="sidebar close">
    <div class="logo-details">
      <i class='bx bxl-codepen'></i>
      <span class="logo_name">AXGG</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="../">
          <i class='bx bx-grid-alt'></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="../">Dashboard</a></li>
        </ul>
      </li>

      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-book-alt'></i>
            <span class="link_name">Inventory</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Inventory</a></li>
          <li><a href="../inventory/category.php">Category</a></li>
          <li><a href="../inventory/product.php">Products</a></li>
          <li><a href="../inventory/color.php">Color</a></li>
          <li><a href="../inventory/size.php">Size</a></li>
          <li><a href="../inventory/stock.php">Stock</a></li>
        </ul>
      </li>

      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection'></i>
            <span class="link_name">Orders</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Orders</a></li>
          <li><a href="../orders/pending.php">Pending</a></li>
          <li><a href="../orders/followup.php">Follow-up</a></li>
          <li><a href="../orders/confirmed.php">Confirmed</a></li>
          <li><a href="../orders/paid.php">Paid</a></li>
          <li><a href="../orders/pickup.php">Ready for Pickup</a></li>
          <li><a href="../orders/shipped.php">Shipped Products</a></li>
          <li><a href="../orders/completed.php">Completed</a></li>
          <li><a href="../orders/refund.php">Refund</a></li>
          <li><a href="../orders/cancelled.php">Cancelled</a></li>
        </ul>
      </li>

      <li>
        <a href="../pages/messages.php">
          <i class='bx bx-message-dots'></i>
          <span class="link_name">Messages</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="../pages/messages.php">Messages</a></li>
        </ul>
      </li>
      <li>
        <a href="../pages/user.php">
          <i class='bx bx-user'></i>
          <span class="link_name">Users</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="../pages/user.php">Users</a></li>
        </ul>
      </li>

      <li>
        <a href="../pages/admin.php">
          <i class='bx bxs-user-badge'></i>
          <span class="link_name">Admin</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="../pages/admin.php">Admin</a></li>
        </ul>
      </li>

      <li>
        <a href="../pages/settings.php">
          <i class='bx bx-cog'></i>
          <span class="link_name">Setting</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="../pages/setting.phpx">Setting</a></li>
        </ul>
      </li>
      <li>
        
      <div class="profile-details">
  <div class="profile-content">
    <img src="../includes/img/logo.png" alt="profileImg">
  </div>
  <div class="name-job">
    <div class="profile_name"><?php echo $_SESSION["name"]; ?></div>
    <div class="job"><?php echo $_SESSION["user_level"]; ?></div>
  </div>
  <a href="../includes/logout.php" class="logout-link"><i class='bx bx-log-out'></i></a>
</div>


      </li>
    </ul>
  </div>

  <script>
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
      arrow[i].addEventListener("click", (e) => {
        let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
        arrowParent.classList.toggle("showMenu");
      });
    }

  </script>
</body>

</html>
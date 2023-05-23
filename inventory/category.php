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
  <title>AXGG | Category</title>
  <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
  <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./css/category.css">
</head>

<body>
  <?php include '../includes/sidenav.php' ?>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu'></i>
      <span class="text">Category</span>
    </div>

    <div class="ag-format-container">

      <div class="ag-courses_item" style="height:10vh;">
        <a href="#" class="ag-courses-item_link" onclick="showModal()">
          <div class="ag-courses-item_bg"></div>
          <div class="ag-courses-item_title">
            add category
          </div>
        </a>
      </div>

      <div class="modal" id="myModal">
        <div class="modal-content" style="background-color:transparent;">
          <div class="subscribe" style="background-color:white;">
            <p>CATEGORY</p>
            <input id="categoryInput" placeholder="what's new" class="subscribe-input" name="category" type="text">
            <br>
            <div class="submit-btn" onclick="addCategory()">ADD</div>
          </div>
        </div>
      </div>

      <div class="ag-courses_box">
        <?php
        function displayCategories()
        {
          include '../config.php';
          $query = "SELECT c.category_id, c.category, SUM(s.stock) AS total_stock
            FROM category c
            LEFT JOIN stock s ON c.category_id = s.category_id
            GROUP BY c.category_id";
          $result = mysqli_query($conn, $query);

          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              $category = $row['category'];
              $categoryId = $row['category_id'];
              $totalStock = $row['total_stock'];

              echo '
                  <div class="ag-courses_item">
                    <a href="category-view.php?category_id=' . $categoryId . '" class="ag-courses-item_link">
                        <div class="ag-courses-item_bg"></div>
                        <div class="ag-courses-item_title">
                            ' . $category . '
                        </div>
                        <div class="ag-courses-item_date-box">
                            Total Product<br>Stock:
                            <span class="ag-courses-item_date">
                                ' . $totalStock . '
                            </span>
                        </div>
                    </a>
                  </div>';
            }
          } else {
            echo 'No categories found.';
          }
          mysqli_close($conn);
        }
        displayCategories();
        ?>

      </div>
    </div>
  </section>
  <script src="../assets/js/nav.js"></script>
  <script src="./js/category.js"></script>

</body>

</html>
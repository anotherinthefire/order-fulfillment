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
  <title>AXGG | Stock</title>
  <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
  <link rel="stylesheet" href="./css/stock.css">
</head>

<body>
  <?php include('../includes/sidenav.php') ?>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu'></i>
      <span class="text">Stock</span>
    </div>

    <?php
    // Establish a database connection
    include('../config.php');

    // Retrieve data from the database
    $categoryQuery = "SELECT * FROM category";
    $categoryResult = $conn->query($categoryQuery);

    $productQuery = "SELECT * FROM products";
    $productResult = $conn->query($productQuery);

    $colorQuery = "SELECT * FROM color";
    $colorResult = $conn->query($colorQuery);

    $sizeQuery = "SELECT * FROM size";
    $sizeResult = $conn->query($sizeQuery);
    ?>

    <!-- HTML form -->
    <form class="form" style="margin-bottom: 100px" action="actions/add-stock.php" method="POST">
      <header>
        Add Stock
        <span class="message">Fill the form to continue.</span>
      </header>
      <label>
        <span>Category</span>
        <div class="custom-select">
          <select class="input" required="" style="width:80vw" name="category_id">
            <option value="" disabled selected>Choose category</option>
            <?php while ($row = $categoryResult->fetch_assoc()) : ?>
              <option value="<?php echo $row['category_id']; ?>"><?php echo $row['category']; ?></option>
            <?php endwhile; ?>
          </select>
        </div>
      </label>
      <label>
        <span>Product</span>
        <div class="custom-select">
          <select class="input" required="" style="width:80vw" name="prod_id">
            <option value="" disabled selected>Choose product</option>
            <?php while ($row = $productResult->fetch_assoc()) : ?>
              <option value="<?php echo $row['prod_id']; ?>"><?php echo $row['prod_name']; ?></option>
            <?php endwhile; ?>
          </select>
        </div>
      </label>
      <fieldset>
        <label class="sm">
          <span>Color</span>
          <div class="custom-select">
            <select class="input" required="" style="width:30vw" name="color_id">
              <option value="" disabled selected>Choose color</option>
              <?php while ($row = $colorResult->fetch_assoc()) : ?>
                <option value="<?php echo $row['color_id']; ?>"><?php echo $row['color']; ?></option>
              <?php endwhile; ?>
            </select>
          </div>
        </label>
        <label class="sm">
          <span>Size</span>
          <div class="custom-select">
            <select class="input" required="" style="width:30vw" name="size_id">
              <option value="" disabled selected>Choose size</option>
              <?php while ($row = $sizeResult->fetch_assoc()) : ?>
                <option value="<?php echo $row['size_id']; ?>"><?php echo $row['size']; ?></option>
              <?php endwhile; ?>
            </select>
          </div>
        </label>
        <label class="sm">
          <span>Quantity</span>
          <input class="input" placeholder="..." type="text" required="" name="quantity">
        </label>
      </fieldset>
      <div class="submitCard">
        <button type="submit">Add Stock</button>
      </div>
    </form>

    <div class="container">
      <?php
      $sql = "SELECT p.prod_name, p.prod_img, c.category, s.size, co.color, st.stock
              FROM products p
              JOIN stock st ON p.prod_id = st.prod_id
              JOIN category c ON st.category_id = c.category_id
              LEFT JOIN size s ON st.size_id = s.size_id
              LEFT JOIN color co ON st.color_id = co.color_id
              ORDER BY p.prod_id DESC";

      $result = mysqli_query($conn, $sql);

      if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $productName = $row['prod_name'];
          $productImage = $row['prod_img'];
          $category = $row['category'];
          $size = $row['size'];
          $color = $row['color'];
          $stock = $row['stock'];

          echo '<div class="card" style="margin-bottom:30px">';
          echo '<div class="card__descr-wrapper">';
          echo '<img src="../../product_images/' . $productImage . '" style="width: 100%;">';
          echo '<p class="card__title">' . $productName . '</p>';
          echo '<p class="card__descr">';
          echo 'Category: ' . $category . '<br>';
          echo 'Size: ' . $size . '<br>';
          echo 'Color: ' . $color . '<br>';
          echo 'Quantity: ' . $stock;
          echo '</p>';
          echo '<div class="card__links">';
          echo '<a class="link" href="#" style="width: 100%; text-align: center; background-color: #323232; color: white; padding: 8px;">Edit</a>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }
      } else {
        echo'<p>no product found</p>';
      }
      ?>

    </div>
  </section>
  <script src="../assets/js/nav.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AXGG | Stock</title>
  <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
  <style>
    .container {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    .card {
      --font-color: #323232;
      --bg-color: #e0e0e0;
      width: 250px;
      height: 350px;
      border-radius: 20px;
      background: var(--bg-color);
      display: flex;
      flex-direction: column;
      transition: .4s;
      position: relative;
    }

    .card:hover {
      transform: scale(1.02);
    }



    .card__descr-wrapper {
      padding: 15px;
      display: grid;
    }

    .card__title {
      color: var(--font-color);
      text-align: center;
      margin-bottom: 15px;
      font-weight: 900;
      font-size: 16px;
    }

    .card__descr {
      color: var(--font-color);
    }

    .svg {
      width: 25px;
      height: 25px;
      transform: translateY(25%);
      fill: var(--font-color);
    }

    .card__links {
      margin-top: 10px;
      display: flex;
      justify-content: space-between;
      align-self: flex-end;
    }

    .card__links .link {
      color: var(--font-color);
      font-weight: 600;
      font-size: 15px;
      text-decoration: none;
    }

    .card__links .link:hover {
      text-decoration: underline;
    }

    /* Initial form state */
    .form {
      --col1: #fff;
      --col2: #252325;
      --col3: white;
      --col4: #ffffff;
      --col5: #323232;
      --sh: rgba(80, 80, 80, 0.35);
      --rad: 4px;
      --radBig: 10px;
      border-radius: 0 0 var(--radBig) var(--radBig);
      box-shadow: 0 0 20px var(--sh);
      display: flex;
      flex-direction: column;
      gap: 1.5em 1em;
      padding: 1em;
      position: relative;
      max-width: 90%;
      max-height: 90px;
      transition: background .3s ease-out, max-height .3s ease-out;
      overflow: hidden;
      margin-left: auto;
      margin-right: auto;
    }

    .form::before {
      content: 'Add new stock?';
      color: var(--col2);
      font-size: 1.2em;
      font-weight: 700;
      display: grid;
      width: calc(100% - 2em);
      height: 60%;
      position: absolute;
      place-items: center;
      z-index: 99999;
    }

    .form::after {
      content: '';
      backdrop-filter: blur(6px) grayscale(100%);
      background: linear-gradient(-180deg, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, .5) 70%, rgba(255, 255, 255, 0.3) 90%);
      height: 100%;
      max-width: 90%;
      left: 0;
      top: 0;
      display: block;
      position: absolute;
      z-index: 999;

    }

    .form::after,
    .form::before {
      border-radius: 0 0 var(--radBig) var(--radBig);
      pointer-events: none;
      transition: all .5s ease-out;
    }

    /* Form hover and focus */
    .form:hover,
    .form:focus-within {
      max-width: 90%;
      max-height: 680px;

    }

    .form:focus-within {
      overflow: initial;
    }

    .form:hover::before,
    .form:hover::after {
      opacity: 0;
    }

    .form:hover::after {
      backdrop-filter: blur(0) grayscale(0%);
    }

    .form header {
      color: var(--col1);
      font-size: 1.25rem;
      font-weight: 600;
    }

    /* Labels and inputs UI */
    :is(.form) label span,
    label input {
      flex: 1 100%;
      transition: all .3s ease-out;
    }

    :is(.form) input,
    select,
    button {
      appearance: none;
      border: 0;
      padding: .75em;
      border-radius: var(--rad);
      transition: all .3s ease-out;
    }

    .form label {
      display: flex;
      flex-flow: row wrap;
      color: var(--col4);
      gap: .5em;
    }

    .form input {
      box-shadow: inset 3px 3px 1px var(--sh);
    }

    .form fieldset {
      display: flex;
      backdrop-filter: blur(10px);
      flex-flow: row nowrap;
      gap: 1em;
      position: relative;
      transition: all .3s ease-out;
      padding: 1rem;
      z-index: 10;
      border: 3px double var(--col1);
      border-radius: var(--rad);
    }

    .form fieldset label {
      flex: 1;
      display: flex;
      flex-flow: row wrap;
      font-size: .75em;
    }

    .sm {
      justify-content: space-around;
    }

    .sm span {
      text-align: center;
    }

    .form select {
      box-shadow: inset 3px 3px 1px var(--sh);
      padding: .75em 1.75em .75em 0.5em;
      position: relative;
    }

    .custom-select {
      position: relative;
    }

    .custom-select::after {
      position: absolute;
      content: "";
      top: 45%;
      right: 5px;
      width: 0;
      height: 0;
      border: 6px solid transparent;
      border-color: var(--col5) transparent transparent transparent;
    }

    .form fieldset span {
      flex: 1 100%;
    }

    .form fieldset input {
      flex: 0 1 40px;
    }

    .form button {
      background-color: var(--col1);
      color: var(--col4);
      border: 2px solid var(--col4);
      font-size: 1em;
      font-weight: 700;
      align-self: center;
      padding: .5em 1.5em;
      appearance: none;
    }

    /* Form and UI valid and invalid states */
    .form input:focus,
    .form select:focus {
      outline: 3px solid var(--col3);
      outline-offset: 1px;
    }

    .form input:invalid:not(:focus),
    .form select:invalid:not(:focus) {
      background-color: var(--col3);
      outline: 3px solid var(--col4);
      outline-offset: 1px;
    }

    .form input:valid:not(:focus),
    .form select:valid:not(:focus) {
      outline: 3px solid var(--col1);
      outline-offset: 1px;
    }

    .form .message {
      display: block;
      opacity: 0;
      font-size: .75em;
      font-weight: 400;
      transition: all .3s ease-out;
      margin: -1rem 0 0;
    }

    .form:has(:invalid) .message {
      opacity: 1;
      margin: .25rem 0 0 0;
    }

    label:has(input:invalid),
    label:has(select:invalid) {
      color: var(--col3);
      opacity: .8;
    }

    label:has(input:valid),
    label:has(select:valid) {
      opacity: 1;
    }

    .form:hover:has(:focus, :active):valid .submitCard {
      max-height: 180px;
      opacity: 1;
      transition: opacity 1s ease-out .5s, translate 1.3s ease-out;
      translate: 0 100%;
    }

    .form:hover:invalid {
      transition: all .3s ease-out;
      background-color: var(--col5);
    }

    .form:hover:valid {
      transition: all .3s ease-out;
      background-color: var(--col1);
    }

    .form:hover:valid * {
      color: var(--col2);
    }

    .form:hover:valid input,
    .form:hover:valid select {
      outline: 3px solid var(--col2);
    }

    .form:hover:invalid fieldset {
      border: 1px dashed var(--col3);
    }

    .form:hover:valid fieldset {
      border: 1px dashed var(--col2);
    }

    /* Submit block */
    .form .submitCard {
      display: flex;
      justify-content: center;
      background-color: var(--col2);
      border-radius: 0 0 var(--rad) var(--rad);
      bottom: 0;
      padding: .5em;
      opacity: 0;
      max-height: 0;
      translate: 0 -100%;
      position: absolute;
      width: calc(100% - 2em);
      transition: all .5s ease-out .1s;
      z-index: 1;
    }
  </style>
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


    <!-- <div class="card" style="width:90%; margin-bottom:50px; margin-left:auto; margin-right:auto;">
      <a href="">
        <p class="card__title" style="font-size:5vh; line-height:9vh;">
          add stock
        </p>
      </a>
    </div> -->

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

          // Use the variables in the HTML code to display the product details
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
        // Product not found
      }
      ?>

    </div>






  </section>
  <script src="../assets/js/nav.js"></script>
</body>

</html>
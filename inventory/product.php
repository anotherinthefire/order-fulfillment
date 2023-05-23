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
  <title>AXGG | Product</title>
  <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
  <link rel="stylesheet" href="./css/product.css">
</head>

<body>
  <?php include('../includes/sidenav.php') ?>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu'></i>
      <span class="text">Products</span>
    </div>

    <div class="modal" id="modal">
      <div class="modal-overlay">
        <form class="form" action="actions/add-product.php" method="POST" enctype="multipart/form-data" style="margin-left:30%; margin-top:10%; margin-bottom:auto; width:40%">
          <span class="title">new product</span>
          <span class="sub mb">put the image here</span>
          <input id="file" type="file" name="productImage">
          <label class="avatar" for="file"><span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <g stroke-width="0" id="SVGRepo_bgCarrier"></g>
                <g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g>
                <g id="SVGRepo_iconCarrier">
                  <path fill="#ffffff" d="M17.1813 16.3254L15.3771 14.5213C16.5036 13.5082 17.379 12.9869 18.2001 12.8846C19.0101 12.7837 19.8249 13.0848 20.8482 13.8687C20.8935 13.9034 20.947 13.9202 21 13.9202V15.024C21 19.9452 19.9452 21 15.024 21H8.976C4.05476 21 3 19.9452 3 15.024V13.7522C3.06398 13.7522 3.12796 13.7278 3.17678 13.679L4.45336 12.4024C5.31928 11.5365 6.04969 10.8993 6.71002 10.4791C7.3679 10.0605 7.94297 9.86572 8.50225 9.86572C9.06154 9.86572 9.6366 10.0605 10.2945 10.4791C10.9548 10.8993 11.6852 11.5365 12.5511 12.4024L16.8277 16.679C16.9254 16.7766 17.0836 16.7766 17.1813 16.679C17.2789 16.5813 17.2789 16.423 17.1813 16.3254Z" opacity="0.1"></path>
                  <path stroke-width="2" stroke="#ffffff" d="M3 8.976C3 4.05476 4.05476 3 8.976 3H15.024C19.9452 3 21 4.05476 21 8.976V15.024C21 19.9452 19.9452 21 15.024 21H8.976C4.05476 21 3 19.9452 3 15.024V8.976Z"></path>
                  <path stroke-linecap="round" stroke-width="2" stroke="#ffffff" d="M17.0045 16.5022L12.7279 12.2256C9.24808 8.74578 7.75642 8.74578 4.27658 12.2256L3 13.5022"></path>
                  <path stroke-linecap="round" stroke-width="2" stroke="#ffffff" d="M21.0002 13.6702C18.907 12.0667 17.478 12.2919 15.1982 14.3459"></path>
                  <path stroke-width="2" stroke="#ffffff" d="M17 8C17 8.55228 16.5523 9 16 9C15.4477 9 15 8.55228 15 8C15 7.44772 15.4477 7 16 7C16.5523 7 17 7.44772 17 8Z"></path>
                </g>
              </svg></span></label>
          <div id="imagePreview"></div>
          <input type="text" class="input" name="productName" placeholder="product name" required>
          <input type="number" class="input" name="productPrice" placeholder="price" required>
          <textarea class="input" name="productDescription" placeholder="description" required></textarea>
          <button type="submit">add</button>
        </form>
      </div>
    </div>

    <div class="container">
      <button class="custom-btn btn-16" id="addProductBtn"><b>Add New Product</b></button>

      <div class="row">
        <?php
        function displayProducts()
        {
          include('../config.php');
          $query = "SELECT p.prod_id, p.prod_name, p.prod_price, p.prod_img 
                    FROM products p";
          $result = mysqli_query($conn, $query);

          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              $prodId = $row['prod_id'];
              $prodName = $row['prod_name'];
              $prodPrice = $row['prod_price'];
              $prodImage = $row['prod_img'];

              echo '
            
            <div class="col-12 col-sm-8 col-md-6 col-lg-4 mb-5">
                <div class="card">
                    <img class="card-img" src="../../product_images/' . $prodImage . '" alt="' . $prodName . '">
                    <div class="card-img-overlay d-flex justify-content-end"></div>
                    <div class="card-body">
                        <h4 class="card-title">' . $prodName . '</h4>
                        <h6 class="card-subtitle mb-2 text-muted">Prod ID: ' . $prodId . '</h6>
                        <div class="buy d-flex justify-content-between align-items-center">
                            <div class="price"><h5 class="mt-4">₱' . $prodPrice . '</h5></div>
                            <a href="#" class="btn btn-danger mt-3"><i class="bx bx-detail"></i> View</a>
                        </div>
                    </div>
                </div>
            </div>';
            }
          } else {
            echo 'No products found.';
          }
          mysqli_close($conn);
        }
        displayProducts();
        ?>
      </div>
    </div>
  </section>
  <script src="../assets/js/nav.js"></script>
  <script src="./js/product.js"></script>
</body>

</html>
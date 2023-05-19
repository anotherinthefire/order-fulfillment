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
  <style>
    button {
      margin: 20px;
    }

    .custom-btn {
      width: 130px;
      height: 40px;
      color: #fff;
      border-radius: 5px;
      padding: 10px 25px;
      font-family: 'Lato', sans-serif;
      font-weight: 500;
      background: transparent;
      cursor: pointer;
      transition: all 0.3s ease;
      position: relative;
      display: inline-block;
      box-shadow: inset 2px 2px 2px 0px rgba(255, 255, 255, .5),
        7px 7px 20px 0px rgba(0, 0, 0, .1),
        4px 4px 5px 0px rgba(0, 0, 0, .1);
      outline: none;
    }

    /* 16 */
    .btn-16 {
      border: none;
      color: #000;
      width: 100%;
      margin-top: 5vh;
      margin-bottom: 5vh;
      margin-left: auto;
      margin-right: auto;
    }

    .btn-16:after {
      position: absolute;
      content: "";
      width: 0;
      height: 100%;
      top: 0;
      left: 0;
      direction: rtl;
      z-index: -1;
      box-shadow:
        -7px -7px 20px 0px #fff9,
        -4px -4px 5px 0px #fff9,
        7px 7px 20px 0px #0002,
        4px 4px 5px 0px #0001;
      transition: all 0.3s ease;
    }

    .btn-16:hover {
      color: #000;
    }

    .btn-16:hover:after {
      left: auto;
      right: 0;
      width: 100%;
    }

    .btn-16:active {
      top: 2px;
    }

    .modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.4);
      z-index: 999;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .modal .form {
      /* Modal form styles */
    }


    .form {
      display: flex;
      flex-direction: column;
      gap: 10px;
      width: 300px;
      background-color: #fff;
      border-radius: 20px;
      padding: 30px 20px;
      box-shadow: 100px 100px 80px rgba(0, 0, 0, 0.03)
    }

    .title {
      color: black;
      font-weight: bold;
      text-align: center;
      font-size: 20px;
      margin-bottom: 4px;
    }

    .sub {
      text-align: center;
      color: black;
      font-size: 14px;
      width: 100%;
    }

    .sub.mb {
      margin-bottom: 1px;
    }

    .sub a {
      color: rgb(23, 111, 211);
    }

    .avatar {
      height: 50px;
      width: 50px;
      background-color: rgb(23, 111, 211);
      border-radius: 50%;
      align-self: center;
      padding: 6px;
      cursor: pointer;
      box-shadow: 12.5px 12.5px 10px rgba(0, 0, 0, 0.015), 100px 100px 80px rgba(0, 0, 0, 0.03);
    }

    .form button {
      align-self: flex-end;
    }

    .input,
    button {
      border: none;
      outline: none;
      width: 100%;
      padding: 16px 10px;
      background-color: rgb(247, 243, 243);
      border-radius: 10px;
      box-shadow: 12.5px 12.5px 10px rgba(0, 0, 0, 0.015), 100px 100px 80px rgba(0, 0, 0, 0.03);
    }

    button {
      margin-top: 12px;
      background-color: rgb(23, 111, 211);
      color: #fff;
      text-transform: uppercase;
      font-weight: bold;
    }

    .input:focus {
      border: 1px solid rgb(23, 111, 211);
    }

    #file {
      display: none;
    }
  </style>
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

          // Step 2: Retrieve products from the database
          $query = "SELECT p.prod_id, p.prod_name, p.prod_price, p.prod_img 
              FROM products p";
          $result = mysqli_query($conn, $query);

          // Step 3: Generate HTML output
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              $prodId = $row['prod_id'];
              $prodName = $row['prod_name'];
              $prodPrice = $row['prod_price'];
              $prodImage = $row['prod_img'];

              // Generate the HTML markup for each product
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

          // Close the database connection
          mysqli_close($conn);
        }

        // Call the function to display the products
        displayProducts();
        ?>


      </div>
    </div>



  </section>
  <script src="../assets/js/nav.js"></script>
  <script>
    const modal = document.getElementById('modal');
    const modalOverlay = document.querySelector('.modal-overlay');
    const addProductBtn = document.getElementById('addProductBtn');

    addProductBtn.addEventListener('click', function() {
      modal.style.display = 'block';
    });

    modalOverlay.addEventListener('click', function(event) {
      if (event.target === modalOverlay) {
        modal.style.display = 'none';
      }
    });

    const fileInput = document.getElementById('file');
    const imagePreview = document.getElementById('imagePreview');

    fileInput.addEventListener('change', function(event) {
      const file = event.target.files[0];

      if (file) {
        const reader = new FileReader();

        reader.addEventListener('load', function() {
          const imageURL = reader.result;
          imagePreview.innerHTML = `<img src="${imageURL}" alt="Preview" style="max-width: 100%; max-height: 200px;">`;
        });

        reader.readAsDataURL(file);
      } else {
        imagePreview.innerHTML = '';
      }
    });
  </script>
</body>

</html>
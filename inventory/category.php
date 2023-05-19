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
  <style>
    .ag-format-container {
      width: 100%;
      margin: 0 auto;
    }


    body {
      background-color: #000;
    }

    .ag-courses_box {
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-align: start;
      -ms-flex-align: start;
      align-items: flex-start;
      -ms-flex-wrap: wrap;
      flex-wrap: wrap;

      padding: 50px 0;
    }

    .ag-courses_item {
      -ms-flex-preferred-size: calc(33.33333% - 30px);
      flex-basis: calc(33.33333% - 30px);

      margin: 0 15px 30px;

      overflow: hidden;

      border-radius: 28px;
    }

    .ag-courses-item_link {
      display: block;
      padding: 30px 20px;
      background-color: #1E1E1E;

      overflow: hidden;

      position: relative;
    }

    .ag-courses-item_link:hover,
    .ag-courses-item_link:hover .ag-courses-item_date {
      text-decoration: none;
      color: #FFF;
    }

    .ag-courses-item_link:hover .ag-courses-item_bg {
      -webkit-transform: scale(10);
      -ms-transform: scale(10);
      transform: scale(10);
    }

    .ag-courses-item_title {
      min-height: 87px;
      margin: 0 0 25px;

      overflow: hidden;

      font-weight: bold;
      font-size: 30px;
      color: #FFF;

      z-index: 2;
      position: relative;
    }

    .ag-courses-item_date-box {
      font-size: 18px;
      color: #FFF;

      z-index: 2;
      position: relative;
    }

    .ag-courses-item_date {
      font-weight: bold;
      color: #f9b234;

      -webkit-transition: color .5s ease;
      -o-transition: color .5s ease;
      transition: color .5s ease
    }

    .ag-courses-item_bg {
      height: 128px;
      width: 128px;
      background-color: #f9b234;

      z-index: 1;
      position: absolute;
      top: -75px;
      right: -75px;

      border-radius: 50%;

      -webkit-transition: all .5s ease;
      -o-transition: all .5s ease;
      transition: all .5s ease;
    }

    .ag-courses_item:nth-child(2n) .ag-courses-item_bg {
      background-color: #3ecd5e;
    }

    .ag-courses_item:nth-child(3n) .ag-courses-item_bg {
      background-color: #e44002;
    }

    .ag-courses_item:nth-child(4n) .ag-courses-item_bg {
      background-color: #952aff;
    }

    .ag-courses_item:nth-child(5n) .ag-courses-item_bg {
      background-color: #cd3e94;
    }

    .ag-courses_item:nth-child(6n) .ag-courses-item_bg {
      background-color: #4c49ea;
    }



    @media only screen and (max-width: 979px) {
      .ag-courses_item {
        -ms-flex-preferred-size: calc(50% - 30px);
        flex-basis: calc(50% - 30px);
      }

      .ag-courses-item_title {
        font-size: 24px;
      }
    }

    @media only screen and (max-width: 767px) {
      .ag-format-container {
        width: 96%;
      }

    }

    @media only screen and (max-width: 639px) {
      .ag-courses_item {
        -ms-flex-preferred-size: 100%;
        flex-basis: 100%;
      }

      .ag-courses-item_title {
        min-height: 72px;
        line-height: 1;

        font-size: 24px;
      }

      .ag-courses-item_link {
        padding: 22px 40px;
      }

      .ag-courses-item_date-box {
        font-size: 16px;
      }
    }

    .modal {
      display: none;
      position: fixed;
      z-index: 999;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
      margin: 30vh auto;
      margin-left: 30%;
      margin-right: auto;
      background-color: #fff;
      width: 300px;
      padding: 20px;
    }

    .subscribe {
      position: relative;
      height: 10rem;
      width: 40vw;
      padding: 20px;
      background-color: transparent;
      /* Remove white background */
      border-radius: 4px;
      color: #333;
      box-shadow: 0px 0px 60px 5px rgba(0, 0, 0, 0.4);
    }

    .subscribe:after {
      position: absolute;
      content: "";
      right: -10px;
      bottom: 18px;
      width: 0;
      height: 0;
      border-left: 0px solid transparent;
      border-right: 10px solid transparent;
      border-bottom: 10px solid #1a044e;
      background-color: white;
    }

    .subscribe p {
      text-align: center;
      font-size: 20px;
      font-weight: bold;
      letter-spacing: 4px;
      line-height: 50px;
    }

    .subscribe input {
      position: absolute;
      bottom: 30px;
      border: none;
      border-bottom: 1px solid #d4d4d4;
      padding: 10px;
      width: 82%;
      background: transparent;
      transition: all .25s ease;
    }

    .subscribe input:focus {
      outline: none;
      border-bottom: 1px solid #0d095e;
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', 'sans-serif';
    }

    .subscribe .submit-btn {
      position: absolute;
      border-radius: 30px;
      border-bottom-right-radius: 0;
      border-top-right-radius: 0;
      background-color: #1E1E1E;
      color: #FFF;
      padding: 12px 25px;
      display: inline-block;
      font-size: 12px;
      font-weight: bold;
      letter-spacing: 5px;
      right: -10px;
      bottom: -20px;
      cursor: pointer;
      transition: all .25s ease;
      box-shadow: -5px 6px 20px 0px rgba(26, 26, 26, 0.4);
    }

    .subscribe .submit-btn:hover {
      background-color: #07013d;
    }
  </style>
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

  // Close the database connection
  mysqli_close($conn);
}

// Call the function to display the categories and stock totals
displayCategories();
?>



      </div>
    </div>
  </section>
  <script src="../assets/js/nav.js"></script>
  <script>
    function showModal() {
      var modal = document.getElementById("myModal");
      modal.style.display = "block";

      // Attach event listener to close the modal when clicked outside
      window.addEventListener("click", function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      });
    }

    function addCategory() {
      var categoryInput = document.getElementById('categoryInput');
      var category = categoryInput.value.trim();

      if (category !== '') {
        // Send an AJAX request to the PHP script
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'actions/add-category.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
          if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            // Handle the response from the PHP script
            var response = xhr.responseText;
            if (response === 'success') {
              alert('Category added successfully');
              // Reload the page or perform any other action
              location.reload();
            } else if (response === 'exists') {
              alert('Category already exists');
            } else {
              alert('Error adding category');
            }
          }
        };
        xhr.send('category=' + encodeURIComponent(category));
      }
    }
  </script>

</body>

</html>
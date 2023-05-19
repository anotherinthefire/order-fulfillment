<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AXGG | Color</title>
  <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />

  <style>
    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      transition: 0.3s;
      width: 20vh;
      margin-bottom: 2vh;
      margin-left: 2vh;
    }

    .card:hover {
      transform: translateX(-0.5em) translateY(-0.5em);
      border: 1px solid #171717;
      box-shadow: 10px 10px 0px #666666;
    }


    .container {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      padding: 2px 16px;
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

    .form {
      display: flex;
      flex-direction: column;
      gap: 10px;
      background-color: white;
      padding: 2.5em;
      border-radius: 25px;
      transition: .4s ease-in-out;
      box-shadow: rgba(0, 0, 0, 0.4) 1px 2px 2px;
    }

    .form:hover {
      transform: translateX(-0.5em) translateY(-0.5em);
      border: 1px solid #171717;
      box-shadow: 10px 10px 0px #666666;
    }

    .heading {
      color: black;
      padding-bottom: 2em;
      text-align: center;
      font-weight: bold;
    }

    .input {
      border-radius: 5px;
      border: 1px solid whitesmoke;
      background-color: whitesmoke;
      outline: none;
      padding: 0.7em;
      transition: .4s ease-in-out;
    }

    .input:hover {
      box-shadow: 6px 6px 0px #969696,
        -3px -3px 10px #ffffff;
    }

    .input:focus {
      background: #ffffff;
      box-shadow: inset 2px 5px 10px rgba(0, 0, 0, 0.3);
    }

    .form .btn {
      margin-top: 2em;
      align-self: center;
      padding: 0.7em;
      padding-left: 1em;
      padding-right: 1em;
      border-radius: 10px;
      border: none;
      color: black;
      transition: .4s ease-in-out;
      box-shadow: rgba(0, 0, 0, 0.4) 1px 1px 1px;
    }

    .form .btn:hover {
      box-shadow: 6px 6px 0px #969696,
        -3px -3px 10px #ffffff;
      transform: translateX(-0.5em) translateY(-0.5em);
    }

    .form .btn:active {
      transition: .2s;
      transform: translateX(0em) translateY(0em);
      box-shadow: none;
    }
  </style>
</head>

<body>
  <?php include('../includes/sidenav.php') ?>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu'></i>
      <span class="text">Colors</span>
    </div>






    <?php
    include('../config.php');

    $sql = "SELECT * FROM color";
    $result = mysqli_query($conn, $sql);

    // Display colors and their names
    while ($row = mysqli_fetch_assoc($result)) {
      $colorID = $row['color_id'];
      $colorName = $row['color'];
      $colorValue = $row['color'];

      // Exclude the color "N/A"
      if ($colorName !== 'n/a') {
        echo '
        <a href="color-view.php?color_id=' . $colorID . '" style="color:black;">
        <div class="card" style="display: inline-block; margin-right: 10px;">
          <div style="background-color: ' . $colorValue . '; width: 100%; height: 20vh;"></div>
          <div class="container">
            <h4><b>' . $colorName . '</b></h4>
          </div>
        </div>
      </a>';
      }
    }

    // Close the database connection
    mysqli_close($conn);
    ?>

    <div class="card" onclick="showModal()">
      <img src="../includes/img/logo.png" alt="Avatar" style="width: 100%; background-color: black;">
      <div class="container">
        <h4><b>Add Color</b></h4>
      </div>
    </div>

    <div class="modal" id="myModal">
      <div class="modal-content" style="width: 35%; background-color:transparent;">
        <form class="form" onsubmit="addColor(event)">
          <p class="heading">Color</p>
          <input id="colorInput" class="input" placeholder="Enter color" type="text">
          <button class="btn" type="submit">Add</button>
        </form>
      </div>
    </div>


  </section>
  <script src="../assets/js/nav.js"></script>
  <script>
    function showModal() {
      var modal = document.getElementById("myModal");
      modal.style.display = "block";

      // Close the modal when clicking outside of it
      window.onclick = function(event) {
        if (event.target === modal) {
          modal.style.display = "none";
        }
      };
    }

    function addColor(event) {
      event.preventDefault(); // Prevent form submission

      var colorInput = document.getElementById('colorInput');
      var color = colorInput.value.trim();

      if (color !== '') {
        // Send an AJAX request to the PHP script
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'actions/add-color.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
          if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            // Handle the response from the PHP script
            var response = xhr.responseText;
            if (response === 'success') {
              alert('Color added successfully');
              // Reload the page or perform any other action
              location.reload();
            } else if (response === 'exists') {
              alert('Color already exists');
            } else {
              alert('Error adding color');
            }
          }
        };
        xhr.send('color=' + encodeURIComponent(color));
      }
    }
  </script>
</body>

</html>
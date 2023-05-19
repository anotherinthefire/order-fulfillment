<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AXGG | Login</title>
  <style>
    body {
      background-color: #e8e8e8;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    .login {
      
      color: #000;
      text-transform: uppercase;
      letter-spacing: 2px;
      display: block;
      font-weight: bold;
      font-size: x-large;
    }

    .card {
      margin-top: 25vh;
      margin-left: auto;
      margin-right: auto;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 350px;
      width: 28vw;
      height: 40vh;
      flex-direction: column;
      gap: 35px;
      background: #e3e3e3;
      box-shadow: 16px 16px 32px #c8c8c8,
        -16px -16px 32px #fefefe;
      border-radius: 8px;
    }

    .inputBox {
      position: relative;
      width: 250px;
      margin-right: 10px;

    }

    .inputBox input {
      width: 100%;
      padding: 10px;
      outline: none;
      border: none;
      color: #000;
      font-size: 1em;
      background: transparent;
      border-left: 2px solid #000;
      border-bottom: 2px solid #000;
      transition: 0.1s;
      border-bottom-left-radius: 8px;
    }

    .inputBox span {
      margin-top: -34px;
      position: absolute;
      left: 0;
      transform: translateY(-4px);
      margin-left: 10px;
      padding: 10px;
      pointer-events: none;
      font-size: 12px;
      color: #000;
      text-transform: uppercase;
      transition: 0.5s;
      letter-spacing: 3px;
      border-radius: 8px;
    }

    .inputBox input:valid~span,
    .inputBox input:focus~span {
      transform: translateX(113px) translateY(-15px);
      font-size: 0.8em;
      padding: 5px 10px;
      background: #000;
      letter-spacing: 0.2em;
      color: #fff;
      border: 2px;
    }

    .inputBox input:valid,
    .inputBox input:focus {
      border: 2px solid #000;
      border-radius: 8px;
    }

    .enter {
      height: 45px;
      width: 100px;
      border-radius: 5px;
      border: 2px solid #000;
      cursor: pointer;
      background-color: transparent;
      transition: 0.5s;
      text-transform: uppercase;
      font-size: 10px;
      letter-spacing: 2px;
      margin-bottom: 1em;
    }

    .enter:hover {
      background-color: rgb(0, 0, 0);
      color: white;
    }
  </style>
</head>

<body>

  <div class="container">
  <div class="card">
    <a class="login">Log in</a>

      <div class="inputBox">
      <form method="post" action="actions/verification.php">
        <input type="text" name="username" required="required">
        <span class="user">Username</span>
      </div>
  
      <div class="inputBox">
        <input type="password" name="password" required="required">
        <span>Password</span>
      </div>
  
      <button type="submit" class="enter">Enter</button>
    </form>
  </div>
</div>


</body>

</html>
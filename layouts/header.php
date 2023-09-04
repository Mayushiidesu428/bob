<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>bob</title>
  </head>
  <body>
    <div class="main-wrapper">
      <nav class="navbar navbar-expand-lg bg-navbar">
        <div class="container-fluid">
          <nav class="navbar bg-navbar">
          <a class="navbar-brand" href="#">
      <img src="./assets/img/icon.png" alt="Bootstrap" width="30" height="24">
    </a>
          </nav>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <?php
                  $servername = "localhost";
                  $dbusername = "root";
                  $password = "";
                  $dbname = "db_bob";
                  
                      $conn = new mysqli($servername, $dbusername, $password, $dbname);

                      if ($conn->connect_error) {
                        die('Connection failed: ' . $conn->connect_error);
                    }
                    $query = "SELECT * FROM header";
                    $result = mysqli_query($conn, $query);  
                    
                    if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                          $name = $row["header_name"];
                          $link = $row["header_link"];
                          echo '<li class="nav-item">';
                          echo '<a class="nav-link active" aria-current="page" href="' . $link . '">' . $name . '</a>';
                          echo '</li>';
                      }
                  }
              ?>
          </ul>
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <?php
            if (isset($_COOKIE['user'])) {    
              $cookieData = json_decode($_COOKIE['user'], true);
              $id = $cookieData['id'];
              $username = $cookieData['username'];
              $email = $cookieData['email'];
              $role = $cookieData['role'];                  
              $query = "SELECT * FROM list_user WHERE user_id = $id";
              $result = mysqli_query($conn, $query);
              $row = mysqli_fetch_assoc($result);
              if ($row === null) {
                echo '<button type="button" class="btn btn-outline-primary">
                <a href="login.php" style="text-decoration:none">Login</a>
              </button>
              <button type="button" class="btn btn-outline-primary">
                <a href="sign-up.php" style="text-decoration:none">Sign up</a>
              </button>';
            } else {
              if ($result) {
                // Check if the cookie values match the database values
                if ($id == $row["user_id"] &&
                    $username == $row["user_name"] &&
                    $email == $row["user_email"] &&
                    $role == $row["user_role"]) {
                    echo "Hello, " . $username . "!";
                } else {
                  echo '<button type="button" class="btn btn-outline-primary">
                  <a href="login.php" style="text-decoration:none">Login</a>
                </button>
                <button type="button" class="btn btn-outline-primary">
                  <a href="sign-up.php" style="text-decoration:none">Sign up</a>
                </button>';
                }}
            }
                } else {
                  echo '<button type="button" class="btn btn-outline-primary">
                    <a href="login.php" style="text-decoration:none">Login</a>
                  </button>
                  <button type="button" class="btn btn-outline-primary">
                    <a href="sign-up.php" style="text-decoration:none">Sign up</a>
                  </button>';
                }
            ?>
          </div>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
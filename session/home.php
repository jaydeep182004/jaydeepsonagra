<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("location:registration.php");
}

?>
<!doctype html>
<html lang="en">

<head>
  <style>
    .body {
      background-image: url("coding.jpg");
    }

    .title {
      color: red;

    }
  </style>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body class="body">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-$indigo-900 bg-$indigo-900">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">SESSION</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">gallery</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">services</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#">protofolio</a>
            </li>
            <li class="nav-item">
              <!-- <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">about</a> -->
            </li>x
          </ul>
          <form class="d-flex">
            <button><a href="logout.php">Log out</a></button>
          </form>
        </div>
      </div>
    </nav>
    <br><br><br>
    <!-- <div class="title"> -->
    <!-- <h1 class="title">Wel Come to <?php echo $_SESSION['email']; ?> </h1>
    <h2 class="title">youtuber / full stack devloper</h2> -->

    <div class="card" style="width: 50rem;">
      <!-- <div class="card-body "> -->
        <table class="table-success table-striped">
          <thead>
            <tr>
              <th>id</th>
              <th>name</th>
              <th>email</th>
              <th>phone</th>
              <th>action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include('conn.php');
            $email=$_SESSION['email'];
            $sql = "SELECT * FROM session where email='$email'";
            $query = mysqli_query($conn, $sql);

            while ($res = mysqli_fetch_array($query)) {

              echo " <tr>
             <td>" . 1 . "</td>
             <td>" . $res['name'] . "</td>
             <td>" . $res['email'] . "</td>
             <td>" . $res['phone'] . "</td>
             

            <td><a href='update.php?id=$res[id]'><button>edit</button></a>
                <a href='delete.php?id=$res[id]'><button>delete</button></a></td>
        </tr>";


            }
            ?>
          </tbody>
        </table>
      <!-- </div> -->
    </div>
    

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>
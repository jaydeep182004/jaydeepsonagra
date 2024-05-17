<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">crud</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="formdata.php">form</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"
              href="http://localhost/phpmyadmin/index.php?route=/sql&db=php-data&table=tabledata&pos=0">database</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="table_data.php">table</a>
          </li>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <br>
  <div class="container">

    <table border="2px" align="center" class="table table-dark table-striped">

      <thead>
        <tr>
          <th>id</th>
          <th>name</th>
          <th>password</th>
          <th>state</th>
          <th>gender</th>
          <th>hobbies</th>
          <th>image</th>
          <th colspan="2">action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include('connection.php');

        class tabledata extends database
        {
          function tablename()
          {
            $selectquery = "SELECT * FROM oppstable";
            $query = mysqli_query($this->conn, $selectquery);
            $hobbs = "";
            $hobbies = "";
            while ($res = mysqli_fetch_array($query)) {

              $hobbies = $res['hobbies'];
              $hobb = explode(",", $hobbies);
              foreach ($hobb as $key => $value) {
                $hobbs.= "&hobbies[$key]=$value";
              }

              echo " <tr>
                    <td>" . $res['id'] . "</td>
                    <td>" . $res['name'] . "</td>
                    <td>" . $res['password'] . "</td>
                    <td>" . $res['state'] . "</td>
                    <td>" . $res['gender'] . "</td>
                    <td>" . $res['hobbies'] . "</td>
                    <td><img src='" . $res['image'] . "' width='100px' height='100'></td>
  
             
             <td><a href='formdata.php?id=$res[id]&name=" . $res['name'] . "&password=" . $res['password'] . "&state=" . $res['state'] . "&gender=" . $res['gender']  .$hobbs. "&image=" . $res['image'] . "'>edit</a></td>
             <td><a href='deletedata.php?id=$res[id]'>delete</a></td>
             </tr>";
            }
          }
        }
        $tab = new tabledata();
        $tab->tablename();
        ?>
      </tbody>
    </table>

</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
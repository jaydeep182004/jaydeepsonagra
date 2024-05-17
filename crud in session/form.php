<?php
session_start();
include ('connection.php');

if (isset($_GET['editid'])) {
    $editid = $_GET['editid'];
    // echo$editid;

    $dlequery = "SELECT * FROM `session_crud` WHERE `id`='$editid'";
    $conect = mysqli_query($conn, $dlequery);
    $res = mysqli_fetch_array($conect);
    $_SESSION['value'] = $res;
    
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>
<style>
    .small-form {
        border: 3px solid green;
        max-width: 500px;
        margin: 0 auto;
        /* Center the form */
    }

    #button {
        color: red;
        background: black;
    }

    .err {
        color: red;
    }

    .small-table {
        max-width: 800px;
    }
</style>

<body>
    <br><br>
    <div class="container shadow small-form">
        <center>
            <h2>add form data</h2>
        </center>
        <form action="validation.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">name</label>
                <input type="text" name="name"
                    value="<?php echo isset($_SESSION['value']['name']) ? $_SESSION['value']['name'] : '' ?>"
                    placeholder="enter your name" class="form-control">
                <div class="err"><?php echo isset($_SESSION['error']['nameerr']) ? $_SESSION['error']['nameerr'] : '' ?>
                </div>
            </div>
            <div class="form-group">
                <label for="email">email</label>
                <input type="text" name="email"
                    value="<?php echo isset($_SESSION['value']['email']) ? $_SESSION['value']['email'] : '' ?>"
                    placeholder="enter your name" class="form-control">
                <div class="err">
                    <?php echo isset($_SESSION['error']['emailerr']) ? $_SESSION['error']['emailerr'] : '' ?>
                </div>
            </div>
            <div class="form-group">
                <label for="lan">language</label>
                <select name="lan" class="form-control">
                    <option value="">Select a language</option>
                    <option value="English" <?php echo (isset($_SESSION['value']['lan']) && $_SESSION['value']['lan'] == "English") ? 'selected' : ''; ?>>English</option>
                    <option value="Hindi" <?php echo (isset($_SESSION['value']['lan']) && $_SESSION['value']['lan'] == "Hindi") ? 'selected' : ''; ?>>Hindi</option>
                    <option value="Gujarati" <?php echo (isset($_SESSION['value']['lan']) && $_SESSION['value']['lan'] == "Gujarati") ? 'selected' : ''; ?>>Gujarati</option>
                    <option value="Punjabi" <?php echo (isset($_SESSION['value']['lan']) && $_SESSION['value']['lan'] == "Punjabi") ? 'selected' : ''; ?>>Punjabi</option>
                </select>

                <div class="err"><?php echo isset($_SESSION['error']['lanerr']) ? $_SESSION['error']['lanerr'] : '' ?>
                </div>
            </div>
            <div class="form-group">
                <label for="gender">gender</label><br>
                <input type="radio" name="gender" value="male" <?php echo isset($_SESSION['value']['gender']) && $_SESSION['value']['gender'] == "male" ? 'checked' : '' ?>>male
                <input type="radio" name="gender" value="female" <?php echo isset($_SESSION['value']['gender']) && $_SESSION['value']['gender'] == "female" ? 'checked' : '' ?>>female
                <div class="err">
                    <?php echo isset($_SESSION['error']['gendererr']) ? $_SESSION['error']['gendererr'] : '' ?>
                </div>
            </div>
            <div class="form-group">
                <label for="image">image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
                <input type="hidden" name="updateid" value="<?php if (isset($_GET['editid'])) {
                    echo $_GET['editid'];
                }
                if (isset($_GET['id'])) {
                    echo $_GET['id'];
                } ?>">
            </div>
            <br>
            <div class="form-group">
                <?php
                if (isset($_GET['editid']) || isset($_GET['id']) && !empty($_GET['id'])) {
                    echo "<button type='submit' name='update' class='form-control' id='button'>update</button>";
                } else {
                    echo '<button type="submit" name="submit" class="form-control" id="button">submit</button>';
                }
                ?>
            </div>
        </form>
    </div>
    <?php
    session_destroy();
    ?>
    </div>
    <br><br><br>
    <div class="container ">
        <center>
            <h2>table</h2>
        </center>
        <table class="container shadow small-table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>lan</th>
                    <th>gender</th>
                    <th>image</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include ('connection.php');
                $query = "SELECT * FROM `session_crud`";
                $result = mysqli_query($conn, $query);

                while ($res = mysqli_fetch_array($result)) {
                    echo "<tr>
                        <td>" . $res['id'] . "</td>
                        <td>" . $res['name'] . "</td>
                        <td>" . $res['email'] . "</td>
                        <td>" . $res['lan'] . "</td>
                        <td>" . $res['gender'] . "</td>
                        <td><image src=" . $res['image'] . " height='100px' width='100px'></td>
                        <td><a href='form.php?editid=" . $res['id'] . "'><button>edit</button></a></td>
                        <td><a href='validation.php?deleteid=" . $res['id'] . "'><button>delete</button></a></td>

                   </tr>";
                }

                ?>
            </tbody>
        </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>
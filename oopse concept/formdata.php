<?php
include('connection.php');
class insertdata extends database
{
    function insertname()
    {
        $id = "";
        
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            // echo $id;
        }
    }
}

$ins = new insertdata();
$ins->insertname();

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .error {
            color: red;
        }

        .head {
            color: green;
        }
    </style>
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
    <br><br>
    <div
        class="container min-vh-100 d-flex justify-content-center align-items-ceneter my-2 bg-dark w-50 text-light p-2">

        <form action="validation.php" method="post" enctype="multipart/form-data">
            <h2 align="center" class="head">crud form registration</h2><br>
            name:<input type="text" name="name" value="<?php
            if (isset($_GET['name'])) {
                echo $_GET['name'];
            }
            ?>">
            <div class="error">
                <?php if (isset($_GET['nameerr']))
                    echo $_GET["nameerr"]; ?>
            </div>
            <br><br>

            password:<input type="text" name="password" value="<?php
            if (isset($_GET['password'])) {
                echo $_GET['password'];
            }
            // 
            ?>">
            <div class="error">
                <?php if (isset($_GET['passerr']))
                    echo $_GET["passerr"]; ?>
            </div>
            <br><br>

            state:<select name="state">
                <option></option>
                <option value="gujrat" <?php if (isset($_GET['state'])) {
                    if ($_GET['state'] == "gujrat") {
                        echo "selected='selected'";
                    }
                }
                
                ?>>gujrat</option>
                <option value="goa" <?php if (isset($_GET['state'])) {
                    if ($_GET['state'] == "goa") {
                        echo "selected='selected'";
                    }
                }
                
                ?>>goa</option>
                <option value="punjab" <?php if (isset($_GET['state'])) {
                    if ($_GET['state'] == "punjab") {
                        echo "selected='selected'";
                    }
                }
                
                ?>>punjab</option>
            </select>
            <div class="error">
                <?php if (isset($_GET['stateerr']))
                    echo $_GET["stateerr"]; ?>
            </div>
            <br><br>

            gender:
            <input type="radio" name="gender" value="male" <?php if (isset($_GET['gender'])) {
                if ($_GET['gender'] == "male") {
                    echo "checked";
                }
            }
            ?>>Male
            <input type="radio" name="gender" value="female" <?php if (isset($_GET['gender'])) {
                if ($_GET['gender'] == "female") {
                    echo "checked";
                }
            }

            ?>>Female
            <input type="radio" name="gender" value="other" <?php if (isset($_GET['gender'])) {
                if ($_GET['gender'] == "other") {
                    echo "checked";
                }
            }

            ?>>Other
            <div class="error">
                <?php if (isset($_GET['gendererr']))
                    echo $_GET["gendererr"] ?>
                </div>
                <br><br>

                hobbies:<input type="checkbox" name="hobbies[]" value="writing" <?php for ($i = 0; $i < 6; $i++) {
                    if (isset($_GET['hobbies'][$i]) && $_GET['hobbies'][$i] == "writing") {
                            echo "checked";
                        }
                    }
            ?>>writing
            <input type="checkbox" name="hobbies[]" value="playing" <?php for ($i = 0; $i < 6; $i++) {
                if (isset($_GET['hobbies'][$i])) {
                    if ($_GET['hobbies'][$i] == "playing") {
                        echo "checked";
                    }
                }
            }
            
            ?>>playing

            <input type="checkbox" name="hobbies[]" value="whaching" <?php for ($i = 0; $i < 6; $i++) {
                if (isset($_GET['hobbies'][$i])) {
                    if ($_GET['hobbies'][$i] == "whaching") {
                        echo "checked";
                    }
                }
            }
            ?>>whaching

            <input type="checkbox" name="hobbies[]" value="reading" <?php for ($i = 0; $i < 6; $i++) {
                if (isset($_GET['hobbies'][$i])) {
                    if ($_GET['hobbies'][$i] == "reading") {
                        echo "checked";
                    }
                }
            }
            
            ?>>reading

            <input type="checkbox" name="hobbies[]" value="gaming" <?php for ($i = 0; $i < 6; $i++) {
                if (isset($_GET['hobbies'][$i])) {
                    if ($_GET['hobbies'][$i] == "gaming") {
                        echo "checked";
                    }
                }
            }

            ?>>gaming

            <input type="checkbox" name="hobbies[]" value="music" <?php for ($i = 0; $i < 6; $i++) {
                if (isset($_GET['hobbies'][$i])) {
                    if ($_GET['hobbies'][$i] == "music") {
                        echo "checked";
                    }
                }
            }
            
            ?>>music
            <div class="error">
                <?php if (isset($_GET['hobbieserr']))
                    echo $_GET["hobbieserr"]; ?>
            </div>
            <br><br>
            <input type="file" name="image"><br><br>
            <?php
            if (isset($_GET['imagevalue'])) {
                echo "<img src=" . $_GET['imagevalue'] . " width='200px' height='200'>";
            }
            if (isset($_GET['id'])) {

                echo "<img src=" . $_GET['image'] . " width='200px' height='200'>";

            }
            ?>
            <div class="error">
                <?php if (isset($_GET['imagerr']))
                    echo $_GET["imagerr"]; ?>
            </div>
            <br><br>
            <input type="submit" name="submit" value="submit">
            <input type="submit" name="update" value="update">
            <input type="hidden" name="id1" value="<?php 
            if (isset($_GET['id'])) {
                echo $_GET['id'];
            }
            if (isset($_GET['idname'])) {
                $xyz = $_GET['idname'];
                echo $xyz;
            } ?>">
            <button type="button" name="relod"><a href="formdata.php">relod</a></button>
        </form>

    </div>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
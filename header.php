<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/logo.png">

    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Placeholder</title>

</head>


<body>

    <?php
    if (isset($_SESSION["id"])) {
    ?>
        <header class="p-3 bg-dark text-white">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                            <use xlink:href="#bootstrap" />
                        </svg>
                    </a>
                    <a href="index.php"><img src="img/logo.png" alt="Logo" width="50" height="50"></a>
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="index.php" class="nav-link px-2 text-white">Home</a></li>
                        <li><a href="contact.php" class="nav-link px-2 text-white">Contact</a></li>
                        <li><a href="test.php" class="nav-link px-2 text-white">test</a></li>
                        <li><a href="r-medewerker.php" class="nav-link px-2 text-white">reserve</a></li>
                    </ul>

                    <div class="text-end">
                        <button type="button" class="btn btn-outline-light me-2">User: <?php echo $_SESSION["user_id"]; ?></button>
                        <a href="logout.php"><button class="btn btn-outline-light me-2">Logout</button></a>
                        <a href="medewerker-signup.php"><button type="button" class="button btn btn-warning">Sign-up</button></a>
                    </div>
                </div>
            </div>
        </header>
        <?php
        if (isset($_SESSION['message'])) : ?>

            <div class="alert alert-<?= $_SESSION['msg_type'] ?>">

                <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
            </div>
        <?php endif ?>

    <?php
    } elseif (isset($_SESSION["admin_id"])) {
    ?>
        <header class="p-3 bg-dark text-white">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                            <use xlink:href="#bootstrap" />
                        </svg>
                    </a>
                    <a href="index.php"><img src="img/logo.png" alt="Logo" width="50" height="50"></a>
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="index.php" class="nav-link px-2 text-white">Home</a></li>
                        <li><a href="contact.php" class="nav-link px-2 text-white">Contact</a></li>
                        <li><a href="test.php" class="nav-link px-2 text-white">test</a></li>
                        <li><a href="r-medewerker.php" class="nav-link px-2 text-white">reserve</a></li>
                        <li><a href="a-medewerker.php" class="nav-link px-2 text-white">medewerker</a></li>
                    </ul>

                    <div class="text-end">
                        <button type="button" class="btn btn-outline-light me-2">Admin: <?php echo $_SESSION["admin_user"]; ?></button>
                        <a href="logout.php"><button class="btn btn-outline-light me-2">Logout</button></a>
                        <a href="medewerker-signup.php"><button type="button" class="button btn btn-warning">Sign-up</button></a>
                    </div>
                </div>
            </div>
        </header>
        <?php
        if (isset($_SESSION['message'])) : ?>

            <div class="alert alert-<?= $_SESSION['msg_type'] ?>">

                <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
            </div>
        <?php endif ?>


    <?php
    } else {
    ?>
        <header class="p-3 bg-dark text-white">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                            <use xlink:href="#bootstrap" />
                        </svg>
                    </a>
                    <a href="index.php"><img src="img/logo.png" alt="Logo" width="50" height="50"></a>
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="index.php" class="nav-link px-2 text-white">Home</a></li>
                        <li><a href="contact.php" class="nav-link px-2 text-white">Contact</a></li>
                        <li><a href="test.php" class="nav-link px-2 text-white">test</a></li>
                        <li><a href="r-klant.php" class="nav-link px-2 text-white">reserve</a></li>
                    </ul>

                    <div class="text-end">
                        <a href="medewerker-login.php"><button type="submit" class="btn btn-outline-light me-2">Login</button></a>
                        <a onclick="return confirm('This is only for medewerkers! click CANCEL to go back or click OK to proceed')" href="signup-confirm.php"><button type="button" class="button btn btn-warning">Sign-up</button></a>
                    </div>
                </div>
            </div>
        </header>
        <?php
        if (isset($_SESSION['message'])) : ?>

            <div class="alert alert-<?= $_SESSION['msg_type'] ?>">

                <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
            </div>
        <?php endif ?>


    <?php
    }
    ?>
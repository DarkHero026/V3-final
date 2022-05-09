<?php require_once("header.php"); ?>

<?php

if (isset($_POST["submit1"])) { // !!!

    // Hier hal ik de data van index.php, wanneer er op submit geklikt wordt op sign up.
    $userid = $_POST["userid"];
    $pwd = $_POST["pwd"];
    $pwd2 = $_POST["pwd2"];
    $email = $_POST["email"];

    // Neem classes en functie voor sign up.
    include "dbh.php";
    include "signup-database.php";
    include "signup-checker.php";
    //linked to signup-checker.
    $signup = new SignupChecker($userid, $pwd, $pwd2, $email);

    //Error checker linked to signup-checker.php
    $signup->singupUser();
}
?>

<?php
if (isset($_POST["submit1"])) {
    header("location: medewerker-login.php?success=usersuccecfullymade");
?>
    <!-- html line -->
<?php
} else {
?>
    <div class="page1b">

        <main class="form-signin">
            <!-- !!! -->
            <form action="medewerker-signup.php" method="post">
                <img class="mb-4" src="img/logo.png" alt="" width="70" height="70">
                <h1 class="h3 mb-3 fw-normal">Sign up</h1>

                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" name="userid" placeholder="Username">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" name="pwd" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>

                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" name="pwd2" placeholder="Repeat password">
                    <label for="floatingPassword">Repeat password</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingPassword" name="email" placeholder="E-mail">
                    <label for="floatingPassword">Email</label>
                </div>

                <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit1">Sign in</button>

            </form>
        </main>
    </div>

<?php
}

?>

<?php require_once("footer.php"); ?>
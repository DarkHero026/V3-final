<?php require_once("header.php"); ?>

<?php
if (isset($_POST["submit2"])) {

    // Hier hal ik de data van index.php, wanneer er op submit geklikt wordt op sign up.
    $userid = $_POST["userid"];
    $pwd = $_POST["pwd"];

    // Neem classes en functie voor sign up.
    include "dbh.php";
    include "login-database.php";
    include "login-checker.php";
    //linked to signup-checker.
    $login = new LoginChecker($userid, $pwd);

    //Error checker linked to login-checker.php
    $login->loginUser();

    /*gaat terug naar medewerker-login.php
    header("location: medewerker-login.php?error=none");*/
}
?>

<?php
if (isset($_POST["submit2"])) {
    header("location: index.php"); // Dont forget to change this !!!!!
?>
    <!-- html line -->
<?php
} else {
?>
    <div class="page1b">

        <main class="form-signin">
            <!-- !!! -->
            <form action="medewerker-login.php" method="post">

                <img class="mb-4" src="img/logo.png" alt="" width="70" height="70">
                <h1 class="h3 mb-3 fw-normal">Login</h1>

                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" name="userid" placeholder="Username">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" name="pwd" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                    <a href="admin-login.php">Admin</a>
                </div>

                <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit2">Login</button>

            </form>
        </main>
    </div>

<?php
}

?>

<?php require_once("footer.php"); ?>
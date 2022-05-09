<?php
require_once("header.php");
include "a-procces.php";

$postr = new PostA(); // use class postA

$postE = $postr->editPost($_GET['id']);
$id = $postE['id'];
$name = $postE['user_id'];
$pwd = $postE['user_pwd'];
$email = $postE['user_email'];

?>

<div class="container contact-form">
    <!-- info from table inserted in the from -->
    <form action="a-procces.php?update&id=<?= $id ?>" method="post">
        <h3>Edit reservation</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Naam</label>
                    <input type="text" name="naam" class="form-control" value="<?= $name ?>" placeholder="" required />
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="pwd" class="form-control" value="<?= $pwd ?>" placeholder="" required />
                </div>
                <div class="form-group">
                    <label>Telefoon</label>
                    <input type="text" name="email" class="form-control" value="<?= $email ?>" placeholder="" required />
                </div>
                <div class="form-group">
                    <a href="a-medewerker.php" class="btnContact">Cancel</a>
                    <button type="submit" name="update" class="btnContact">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>

<?php require_once("footer.php"); ?>
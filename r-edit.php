<?php
require_once("header.php");
include "r-procces.php";

$postr = new PostR();

$postE = $postr->editPost($_GET['id']);
$id = $postE['id'];
$startid = $postE['check_in'];
$endid = $postE['check_out'];
$name = $postE['naam'];
$adres = $postE['adres'];
$plaats = $postE['plaats'];
$postcode = $postE['postcode'];
$telefoon = $postE['telefoon'];

?>
<!-- info from table inserted in the from -->
<div class="container contact-form">
    <form action="r-procces.php?update&id=<?= $id ?>" method="post">
        <h3>Edit reservation</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Check In</label>
                    <input type="date" name="startid" class="form-control" value="<?= $startid ?>" />
                </div>
                <div class="form-group">
                    <label>Naam</label>
                    <input type="text" name="naam" class="form-control" value="<?= $name ?>" placeholder="" required />
                </div>
                <div class="form-group">
                    <label>Adres</label>
                    <input type="text" name="adres" class="form-control" value="<?= $adres ?>" placeholder="" required />
                </div>
                <div class="form-group">
                    <label>Telefoon</label>
                    <input type="text" name="telefoon" class="form-control" value="<?= $telefoon ?>" placeholder="" required />
                </div>
                <div class="form-group">
                    <a href="r-medewerker.php" class="btnContact">Cancel</a>
                    <button type="submit" name="update" class="btnContact">Update</button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Check Out</label>
                    <input type="date" name="endid" class="form-control" value="<?= $endid ?>" />
                </div>
                <div class="form-group">
                    <label>Plaats</label>
                    <input type="text" name="plaats" class="form-control" value="<?= $plaats ?>" placeholder="" required />
                </div>
                <div class="form-group">
                    <label>Postcode</label>
                    <input type="text" name="postcode" class="form-control" value="<?= $postcode ?>" placeholder="" required />
                </div>
            </div>
        </div>
    </form>
</div>

<?php require_once("footer.php"); ?>
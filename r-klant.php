<?php require_once("header.php");
include "r-procces.php";
?>

<div class="container contact-form">
    <div class="contact-image">

    </div>
    <form action="r-procces.php" method="post">
        <h3>Boek nu</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Check In</label>
                    <input type="date" name="startid" class="form-control" required />
                </div>
                <div class="form-group">
                    <label>Naam</label>
                    <input type="text" name="naam" class="form-control" placeholder="" required />
                </div>
                <div class="form-group">
                    <label>Adres</label>
                    <input type="text" name="adres" class="form-control" placeholder="" required />
                </div>
                <div class="form-group">
                    <label>Telefoon</label>
                    <input type="text" name="telefoon" class="form-control" placeholder="" required />
                </div>
                <div class="form-group">
                    <input type="submit" name="submitr" class="btnContact" value="Reserve" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Check Out</label>
                    <input type="date" name="endid" class="form-control" required />
                </div>
                <div class="form-group">
                    <label>Plaats</label>
                    <input type="text" name="plaats" class="form-control" placeholder="" required />
                </div>
                <div class="form-group">
                    <label>Postcode</label>
                    <input type="text" name="postcode" class="form-control" placeholder="" required />
                </div>
            </div>
        </div>
    </form>
</div>

<?php require_once("footer.php"); ?>
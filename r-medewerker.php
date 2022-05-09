<?php
require_once("header.php");
include "r-procces.php";
?>
<div class="container-sm">
    <?php
    $postr = new PostR();
    Alert();

    if ($postr->getPost()) {

        echo ' <table class="table table-dark table-striped"> ';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Check In</th>';
        echo '<th>Check Out</th>';
        echo '<th>Kamer Nummer</th>';
        echo '<th>Naam</th>';
        echo '<th>Adres</th>';
        echo '<th>Plaats</th>';
        echo '<th>Postcode</th>';
        echo '<th>Telefoon</th>';
        echo '<th colspan="2">Action</th>';
        echo '</tr>';
        echo '</thead>';
        foreach ($postr->getPost() as $postR) {
            echo '<tr>';
            echo '<td>' . $postR['check_in'] . '</td>';
            echo '<td>' . $postR['check_out'] . '</td>';
            echo '<td>' . $postR['id'] . '</td>';
            echo '<td>' . $postR['naam'] . '</td>';
            echo '<td>' . $postR['adres'] . '</td>';
            echo '<td>' . $postR['plaats'] . '</td>';
            echo '<td>' . $postR['postcode'] . '</td>';
            echo '<td>' . $postR['telefoon'] . '</td>';
            echo '<td>';
            echo '<a href="r-edit.php?id=' . $postR['id'] . '" class="btn btn-warning m-1">Edit</a>';
            echo '<a href="r-procces.php?del&id=' . $postR['id'] . '" class="btn btn-danger">Delete</a>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
        echo '<form action="r-procces.php" method="post">';
        echo '<input type="submit" name="exportm" class="btn btn-success" value="Export Excel"/>';
        echo '</form>';
    } else {
        echo "<p class='mt-5 mx-auto'> empty </p>";
    }
    ?>
</div>

<div class="container contact-form">
    <form action="r-procces.php" method="post">
        <h3>Maak boeking</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Check In</label>
                    <input type="date" name="startid" class="form-control" value="" required />
                </div>
                <div class="form-group">
                    <label>Naam</label>
                    <input type="text" name="naam" class="form-control" value="" placeholder="" required />
                </div>
                <div class="form-group">
                    <label>Adres</label>
                    <input type="text" name="adres" class="form-control" value="" placeholder="" required />
                </div>
                <div class="form-group">
                    <label>Telefoon</label>
                    <input type="text" name="telefoon" class="form-control" value="" placeholder="" required />
                </div>
                <div class="form-group">
                    <input type="submit" name="submitm" class="btnContact" value="Reserve" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Check Out</label>
                    <input type="date" name="endid" class="form-control" value="" required />
                </div>
                <div class="form-group">
                    <label>Plaats</label>
                    <input type="text" name="plaats" class="form-control" value="" placeholder="" required />
                </div>
                <div class="form-group">
                    <label>Postcode</label>
                    <input type="text" name="postcode" class="form-control" value="" placeholder="" required />
                </div>
            </div>
        </div>
    </form>
</div>

<?php require_once("footer.php"); ?>
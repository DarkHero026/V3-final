 <?php
    require_once("header.php");
    include "r-procces.php";
    ?>
 <div class="container-sm">
     <h3>Your booking is successfull!</h3>
     <?php
        $postr = new PostR();

        if ($postr->getEndPost()) {

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
            echo '</tr>';
            echo '</thead>';
            foreach (array_slice($postr->getEndPost(), 0, 1) as $postR) {
                echo '<tr>';
                echo '<td>' . $postR['check_in'] . '</td>';
                echo '<td>' . $postR['check_out'] . '</td>';
                echo '<td>' . $postR['id'] . '</td>';
                echo '<td>' . $postR['naam'] . '</td>';
                echo '<td>' . $postR['adres'] . '</td>';
                echo '<td>' . $postR['plaats'] . '</td>';
                echo '<td>' . $postR['postcode'] . '</td>';
                echo '<td>' . $postR['telefoon'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
            echo '<form action="r-procces.php" method="post">';
            echo '<input type="submit" name="exportk" class="btn btn-success" value="Export Excel"/>';
            echo '</form>';
        } else {
            echo "<p class='mt-5 mx-auto'> empty </p>";
        }
        ?>
 </div>
 <?php require_once("footer.php"); ?>
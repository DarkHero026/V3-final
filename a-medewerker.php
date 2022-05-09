<?php
require_once("header.php");
include "a-procces.php";
?>
<div class="container-sm">
    <?php
    $postr = new PostA();

    if ($postr->getPost()) {

        echo ' <table class="table table-dark table-striped"> ';
        echo '<thead>';
        echo '<tr>';
        echo '<th>*ID</th>';
        echo '<th>Name</th>';
        echo '<th>Password</th>';
        echo '<th>Email</th>';
        echo '<th colspan="2">Action</th>';
        echo '</tr>';
        echo '</thead>';
        foreach ($postr->getPost() as $postR) {
            echo '<tr>';
            echo '<td>' . $postR['id'] . '</td>';
            echo '<td>' . $postR['user_id'] . '</td>';
            echo '<td>' . $postR['user_pwd'] . '</td>';
            echo '<td>' . $postR['user_email'] . '</td>';
            echo '<td>';
            echo '<a href="a-edit.php?id=' . $postR['id'] . '" class="btn btn-warning m-1">Edit</a>';
            echo '<a href="a-procces.php?del&id=' . $postR['id'] . '" class="btn btn-danger">Delete</a>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
        echo '<form action="a-procces.php" method="post">';
        echo '<input type="submit" name="exporta" class="btn btn-success" value="Export Excel"/>';
        echo '</form>';
    } else {
        echo "<p class='mt-5 mx-auto'> empty </p>";
    }
    ?>
</div>

<?php require_once("footer.php"); ?>
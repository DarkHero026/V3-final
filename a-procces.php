<?php
include "dbh.php";
include "a-database.php";

$postR = new PostA();

if (isset($_GET['del'])) {
    $id = $_GET['id'];
    $postR->delPost($id);

    header("location: a-medewerker.php?status=deleted");
} else if (isset($_POST['update'])) {
    $id = $_GET['id'];

    $name = $_POST['naam'];
    $pwd = $_POST['pwd'];
    $email = $_POST['email'];

    $postR->updatePost($name, $pwd, $email, $id);

    header("location: a-medewerker.php?status=updated");
}

/*function Alert()
{
    $mysqli = new mysqli('localhost', 'root', '', 'finalV') or mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $result = $mysqli->query("SELECT * FROM klant_r") or mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $totalRows = $result->num_rows;
    if ($totalRows == 8) {
        echo $alert = "<script type='text/javascript'>alert('Only 2 rooms left!');</script>";

        return $alert;
    }
}*/

if (isset($_POST["exporta"])) {
    // Excel file name for download 
    $fileName = "Medewerker-data_" . date('Y-m-d') . ".xls";

    // Fetch records from database 
    $mysqli = new mysqli('localhost', 'root', '', 'finalV') or mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $query = "SELECT * FROM worker";
    $result = mysqli_query($mysqli, $query);
    $output = '';
    if (mysqli_num_rows($result) > 0) {
        $output .= '
        <table class="table" bordered="1">  
        <h3>Medewerkers</h3>
        <thead>
        <tr>
        <th>*ID</th>
        <th>Name</th>
        <th>Password</th>
        <th>Email</th>
        </tr>
        </thead>
    ';
        while ($row = $result->fetch_assoc()) : {
                $output .= '
        <tr>
        <td>' . $row['id'] . '</td>
        <td>' . $row['user_id'] . '</td>
        <td>' . $row['user_pwd'] . '</td>
        <td>' . $row['user_email'] . '</td>
        </tr>      
    ';
            }
        endwhile;
        $output .= '</table>';
        // Headers for download 
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$fileName\"");

        // Render excel data 
        echo $output;

        exit;
    }
}

<?php
include "dbh.php";
include "r-database.php";

$postR = new PostR();

if (isset($_POST['submitr'])) {
    $startid = $_POST['startid'];
    $endid = $_POST['endid'];
    $name = $_POST['naam'];
    $adres = $_POST['adres'];
    $plaats = $_POST['plaats'];
    $postcode = $_POST['postcode'];
    $telefoon = $_POST['telefoon'];

    $postR->addPost($startid, $endid, $name, $adres, $plaats, $postcode, $telefoon);

    header("location: r-klant-booking.php?status=added");
} else if (isset($_POST['submitm'])) {
    $startid = $_POST['startid'];
    $endid = $_POST['endid'];
    $name = $_POST['naam'];
    $adres = $_POST['adres'];
    $plaats = $_POST['plaats'];
    $postcode = $_POST['postcode'];
    $telefoon = $_POST['telefoon'];

    $postR->addPost($startid, $endid, $name, $adres, $plaats, $postcode, $telefoon);

    header("location: r-medewerker.php?status=added");
} else if (isset($_GET['del'])) {
    $id = $_GET['id'];
    $postR->delPost($id);

    header("location: r-medewerker.php?status=deleted");
} else if (isset($_POST['update'])) {
    $id = $_GET['id'];

    $startid = $_POST['startid'];
    $endid = $_POST['endid'];
    $name = $_POST['naam'];
    $adres = $_POST['adres'];
    $plaats = $_POST['plaats'];
    $postcode = $_POST['postcode'];
    $telefoon = $_POST['telefoon'];

    $postR->updatePost($startid, $endid, $name, $adres, $plaats, $postcode, $telefoon, $id,);

    header("location: r-medewerker.php?status=updated");
}

function Alert()
{
    $mysqli = new mysqli('localhost', 'root', '', 'finalV') or mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $result = $mysqli->query("SELECT * FROM klant_r") or mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $totalRows = $result->num_rows;
    if ($totalRows == 8) {
        echo $alert = "<script type='text/javascript'>alert('Only 2 rooms left!');</script>";

        return $alert;
    }
}

if (isset($_POST["exportm"])) {
    // Excel file name for download 
    $fileName = "klant-data_" . date('Y-m-d') . ".xls";

    // Fetch records from database 
    $mysqli = new mysqli('localhost', 'root', '', 'finalV') or mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $query = "SELECT * FROM klant_r";
    $result = mysqli_query($mysqli, $query);
    $output = '';
    if (mysqli_num_rows($result) > 0) {
        $output .= '
        <table class="table" bordered="1">  
        <h3>Boeking</h3>
        <thead>
        <tr>
        <th>Check In</th>
        <th>Check Out</th>
        <th>Kamer Nummer</th>
        <th>Naam</th>
        <th>Adres</th>
        <th>Plaats</th>
        <th>Postcode</th>
        <th>Telefoon</th>
        </tr>
        </thead>
    ';
        while ($row = $result->fetch_assoc()) : {
                $output .= '
        <tr>
        <td>' . $row['check_in'] . '</td>
        <td>' . $row['check_out'] . '</td>
        <td>' . $row['id'] . '</td>
        <td>' . $row['naam'] . '</td>
        <td>' . $row['adres'] . '</td>
        <td>' . $row['plaats'] . '</td>
        <td>' . $row['postcode'] . '</td>
        <td>' . $row['telefoon'] . '</td>
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

if (isset($_POST["exportk"])) {
    // Excel file name for download 
    $fileName = "klant-data_" . date('Y-m-d') . ".xls";

    // Fetch records from database 
    $mysqli = new mysqli('localhost', 'root', '', 'finalV') or mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $query = "SELECT * FROM klant_r ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($mysqli, $query);
    $output = '';
    if (mysqli_num_rows($result) > 0) {
        $output .= '
        <table class="table" bordered="1">
        <h3>Boeking</h3>  
        <thead>
        <tr>
            <th>Check In</th>
            <th>Check Out</th>
            <th>Kamer Nummer</th>
            <th>Naam</th>
            <th>Adres</th>
            <th>Plaats</th>
            <th>Postcode</th>
            <th>Telefoon</th>
        </tr>
        </thead>
       ';
        $row = $result->fetch_assoc(); {
            $output .= '
        <tr>
        <td>' . $row['check_in'] . '</td>
        <td>' . $row['check_out'] . '</td>
        <td>' . $row['id'] . '</td>
        <td>' . $row['naam'] . '</td>
        <td>' . $row['adres'] . '</td>
        <td>' . $row['plaats'] . '</td>
        <td>' . $row['postcode'] . '</td>
        <td>' . $row['telefoon'] . '</td>
        </tr>      
        ';
        }
        $output .= '</table>';
        // Headers for download 
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$fileName\"");

        // Render excel data 
        echo $output;

        exit;
    }
}

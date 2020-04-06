<!doctype html>
<html lang="nl">
<head>
    <meta name="author" content="ilosh">
    <meta charset="UTF-8">
    <title>gar-search-auto2.php</title>
    <link href="garage.css" rel="stylesheet" type="text/css">
</head>
<style type="text/css">
    table{
        text-align: center;
        margin-right: auto;
        margin-left: auto;
    }
</style>
<body>
<h1>garage zoek op klantid 2</h1>
<p>
    op klantid gegevens zoeken uit de
    tabel auto van de database garage.
</p>
<?php
// klantid uit het formulier halen ------------------------
$klantid = $_POST["klantidvak"];

// klantgegevens uit de tabel halen -----------------------
require_once "gar-connect.php";

$autos = $conn->prepare("select * from automerk where klantid= :klantid");
$autos->execute(["klantid" => $klantid]);

// klantgegevens laten zien ------------------------------
echo "<table>";
foreach ($autos as $auto)
{
    echo "<tr>";
    echo "<td>" . $auto['autokenteken'] .        "</td>";
    echo "<td>" . $auto['automerk'] .      "</td>";
    echo "<td>" . $auto['autotype'] .     "</td>";
    echo "<td>" . $auto['autokmstand'] .  "</td>";
    echo "<td>" . $auto['klantid'] .    "</td>";
    echo "</tr>";
}
echo "</table>";
echo "<a href='gar-menu.php'> terug naar het menu</a>";
?>
</body>
</html>

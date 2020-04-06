<!doctype html>
<html lang="nl">
<head>
    <meta name="author" content="ilosh">
    <meta charset="UTF-8">
    <title>gar-read-auto.php</title>
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
<h1>garage read klant</h1>
<p>
    Dit zijn alle gegevens uit de
    tabel klanten van de database garage.
</p>
<?php
// tabel uitlezen en netjes afdrukken --------------------
require_once "gar-connect.php";

$klanten = $conn->prepare("select * from klant");
$klanten->execute();

echo "<table>";
foreach ($klanten as $klant)
{
    echo "<tr>";
    echo "<td>" . $klant['klantid'] .        "</td>";
    echo "<td>" . $klant['klantnaam'] .      "</td>";
    echo "<td>" . $klant['klantadres'] .     "</td>";
    echo "<td>" . $klant['klantpostcode'] .  "</td>";
    echo "<td>" . $klant['klantplaats'] .    "</td>";
    echo "</tr>";
}
echo "</table>";
echo "<a href='gar-menu.php'> terug naar het menu</a>";
?>
</body>
</html>

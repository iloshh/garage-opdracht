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
    tabel auto van de database garage.
</p>
<?php
// tabel uitlezen en netjes afdrukken --------------------
require_once "gar-connect.php";

$autos = $conn->prepare("select * from auto");
$autos->execute();

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


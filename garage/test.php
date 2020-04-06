<!doctype html>
<html lang="nl">
<head>
    <meta name="author" content="ilosh">
    <meta charset="UTF-8">
    <title>gar-search-klant1.php</title>
    <link href="garage.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>TEST</h1>
<p>
    Dit formulier zoekt een klant op uit
    de tabel klanten van database garage.
</p>
<form action="test.php" method="post">
    Welk klantid zoekt u?
    <input type="text" name="klantidvak">    <br />
    <input type="submit">
</form>
</body>
</html>

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

<?php
$klanten = $conn->prepare("select klantid, klantnaam, klantadres, klantpostcode, klantplaats from klant where klantid= :klantid");
$klanten->execute(["klantid" => $klantid]);

// klantgegevens laten zien ------------------------------
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

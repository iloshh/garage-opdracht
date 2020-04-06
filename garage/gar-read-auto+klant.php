<!doctype html>
<html lang="nl">
<head>
    <meta name="author" content="ilosh">
    <meta charset="UTF-8">
    <title>gar-read-auto+klant.php</title>
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
<h1>garage read klant en auto</h1>
<p>
    Dit zijn alle gegevens uit de
    tabel auto en klant van de database garage.
</p>
<?php
require_once "gar-connect.php";

$alles = $conn->prepare("select auto.autokenteken, auto.automerk, auto.autotype, auto.autokmstand, klant.klantnaam, auto.klantid from auto inner join klant ON auto.klantid = klant.klantid");
$alles->execute();

echo "<table>";
echo "<tr>";
echo "<th>Autokenteken</th>";
echo "<th>Automerk</th>";
echo "<th>Autotype</th>";
echo "<th>autokmstand</th>";
echo "<th>klantid</th>";
echo "<th>eigenaar</th>";
echo "</tr>";

foreach ($alles as $alle)
{

    echo "<tr>";
    echo "<td>" . $alle['autokenteken'] .        "</td>";
    echo "<td>" . $alle['automerk'] .      "</td>";
    echo "<td>" . $alle['autotype'] .     "</td>";
    echo "<td>" . $alle['autokmstand'] .  "</td>";
    echo "<td>" . $alle['klantid'] .    "</td>";
    echo "<td>" . $alle['klantnaam'] . "</td>";
    echo "</tr>";
}
echo "</table>";

echo "<a href='gar-menu.php'> terug naar het menu</a>";
?>
</body>
</html>


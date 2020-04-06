<!doctype html>
<html lang="nl">
<head>
    <meta name="author" content="ilosh">
    <meta charset="UTF-8">
    <title>gar-delete-auto2.php</title>
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
<h1>garage delete auto 2</h1>
<p>
    Op klantid gegevens zoeken uit de
    tabel auto van de database garage
    zodat ze verwijderd kunnen worden.
</p>
<?php
// klantid uit het formulier halen ----------------------------
$klantid = $_POST["klantidvak"];

// klantgegevens uit de tabel halen ---------------------------
require_once "gar-connect.php";

$autos = $conn->prepare("select autokenteken, automerk, autotype, autokmstand, klantid from auto where klantid = :klantid");
$autos->execute(["klantid" => $klantid]);

// klantgegevens laten zien ----------------------------------
echo "<table>";
foreach ($autos as $auto)
{
    echo "<tr>";
    echo "<td>" . $auto["autokenteken"] . "</td>";
    echo "<td>" . $auto["automerk"] . "</td>";
    echo "<td>" . $auto["autotype"] . "</td>";
    echo "<td>" . $auto["autokmstand"] . "</td>";
    echo "<td>" . $auto["klantid"] . "</td>";
    echo "</tr>";
}
echo "</table><br />";

echo "<form action='gar-delete-auto3.php' method='post'>";
// klantid mag niet meer gewijzigd worden
echo "<input type='hidden' name='klantidvak' value='$klantid''>";
// Waarde 0 doorgegeven als er niet gecheckt wordt
echo "<input type='hidden' name='verwijdervak' value='0'>";
echo "<input type='checkbox' name='verwijdervak' value='1'>";
echo "Verwijder deze auto. <br />";
echo "<input type='submit'>";
echo "</form>";
?>
</body>
</html>

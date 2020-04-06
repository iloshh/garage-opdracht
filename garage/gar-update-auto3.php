<!doctype html>
<html lang="nl">
<head>
    <meta name="author" content="ilosh">
    <meta charset="UTF-8">
    <title>gar-update-auto3.php</title>
    <link href="garage.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>garage update auto 3</h1>
<p>
    Autogegevens wijzigen in de tabel
    auto van de database garage.
</p>
<?php
// klantgegevens uit het formulier halen -----------------------------
$autokenteken = $_POST["autokentekenvak"];
$automerk = $_POST["automerkvak"];
$autotype = $_POST["autotypevak"];
$autokmstand = $_POST["autokmstandvak"];
$klantid = $_POST["klantidvak"];

// updaten autogegevens ----------------------------------------------
require_once "gar-connect.php";

$sql = $conn->prepare("
update auto set 
autokenteken = :autokenteken,
automerk = :automerk,
autotype = :autotype,
autokmstand = :autokmstand
where klantid = :klantid
");

$sql->execute([
    "klantid" => $klantid,
    "autokenteken" => $autokenteken,
    "automerk" => $automerk,
    "autotype" => $autotype,
    "autokmstand" => $autokmstand
]);

echo "De auto is gewijzigd. <br />";
echo "<a href='gar-menu.php'> terug naar het menu</a>";
?>
</body>
</html>
<!doctype html>
<html lang="nl">
<head>
    <meta name="author" content="ilosh">
    <meta charset="UTF-8">
    <title>gar-create-auto2.php</title>
    <link href="garage.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>garage create auto 2</h1>
<p>
    een auto toevoegen aan de tabel
    auto in de database garage.
</p>
<?php
$autokenteken  =$_POST["autokentekenvak"];
$automerk     =$_POST["automerkvak"];
$autotype    =$_POST["autotypevak"];
$autokmstand =$_POST["autokmstandvak"];
$klantid   =$_POST["klantidvak"];

require_once "gar-connect.php";

$sql = $conn->prepare(" insert into auto values (:autokenteken, :automerk, :autotype, :autokmstand, :klantid)");

$sql->execute([
    "autokenteken" => $autokenteken,
    "automerk" => $automerk,
    "autotype" => $autotype,
    "autokmstand"    => $autokmstand,
    "klantid" => $klantid
]);

echo "De auto is toegevoegd <br />";
echo "<a href='gar-menu.php'> terug naar het menu </a>";
?>
</body>
</html>
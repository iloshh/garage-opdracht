<!doctype html>
<html lang="nl">
<head>
    <meta name="author" content="ilosh">
    <meta charset="UTF-8">
    <title>gar-create-klant2.php</title>
    <link href="garage.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>garage create klant 2</h1>
<p>
    een klant toevoegen aan de tabel
    klant in de database garage.
</p>
<?php
// klantgegevens uit het formulier halen ------------------------
$klantid       =NULL; //komt niet uit het formulier (autoincrement)
$klantnaam     =$_POST["klantnaamvak"];
$klantadres    =$_POST["klantadresvak"];
$klantpostcode =$_POST["klantpostcodevak"];
$klantplaats   =$_POST["klantplaatsvak"];

// klantgegevens invoeren in de tabel-------------------------------
require_once "gar-connect.php";

$sql = $conn->prepare(" insert into klant values (:klantid, :klantnaam, :klantadres, :klantpostcode, :klantplaats)");

//manier 1 {of manier 2 gebruiken}----------------------------------
// $sql->bindParam{":klantid", $klantid};
// $sql->bindParam{":klantnaam", $klantnaam};
// $sql->bindParam{":klantadres", $klantadres};
// $sql->bindParam{":klantpostcode", $klantpostcode};
// $sql->bindParam{":klantplaat", $klantplaats};

//$sql-> execute();

//manier 2 ---------------------------------------------------
$sql->execute([
    "klantid" => $klantid,
    "klantnaam" => $klantnaam,
    "klantadres" => $klantadres,
    "klantpostcode"    => $klantpostcode,
    "klantplaats" => $klantplaats
]);

echo "De klant is toegevoegd <br />";
echo "<a href='gar-menu.php'> terug naar het menu </a>";
?>
</body>
</html>
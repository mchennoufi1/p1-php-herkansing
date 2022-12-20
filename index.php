<!DOCTYPE HTML>
<html>
<head>

</head>
<body>
<h3>Schoen merken</h3>
<?php
try{
    echo "<div>";
    echo "<table class=''>";
    echo "<th class='merk'>Naam</th>";
    $db = new PDO("mysql:host=localhost;dbname=schoenen"
        ,"root");
    $query = $db->prepare("SELECT * FROM merk");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as &$data){
        echo "<tr>";
        echo "<td class='merk'>" . $data["naam"] . "</td>";
        echo "</tr>";
        $id = $data["id"];
    }
    echo "</table>";
    echo "<br>";
    echo "Het aantal merken is " . "$id";
    echo "</div>";
    echo "<table class='col-6'>";
    echo "<th class='model'>Modellen</th>";
    $query = $db->prepare("SELECT * FROM model");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as &$data){
        echo "<tr>";
        echo "<td class='model'>" . $data["naam"] . "</td>";
        echo "</tr>";

    }
    echo "<br>";
    echo "</table>";
    echo "<br>";
    echo "<td>" . "<a href='insert.php'>Merk toevoegen</a>" . "</td>";
    echo "<br>";
    echo "<br>";

} catch(PDOException $e) {
    die("Error!: " . $e->getmessage());
}
?>
</body>
</html>
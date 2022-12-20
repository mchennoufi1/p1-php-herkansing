<!DOCTYPE HTML>
<html>
<head>

</head>
<body>
<form class="merk" method="post" action="">
    <h3>Invoeren van een nieuw merk</h3>
    <label>Merknaam: </label>
    <input type="text" name="merknaam">
    <input type="submit" name="verzenden" value="Verzenden">
</form>
<?php
try{
    $db = new PDO("mysql:host=localhost;dbname=schoenen"
        ,"root");
    if(isset($_POST['verzenden'])) {
        function validate_input($input) {
            $input = trim($input);
            $input = stripslashes($input);
            $input = htmlspecialchars($input);
            return $input;
        }
        session_start();
        $merknaam = $_POST['merknaam'];

        if (empty($_POST["merknaam"])) {
            $merknaamError = "Geen merk toegevoegd";
            echo "<br>";
            echo "$merknaamError";
            echo "<br>";
        } else {
            $merknaam = validate_input($_POST["merknaam"]);
            $_SESSION['merknaam'] = $merknaam;
            $query = $db->prepare("INSERT INTO merk (naam)
                            VALUES('$_POST[merknaam]')");
            if ($query->execute()) {
                echo "<br>";
                echo "$merknaam" .  " is toegevoegd";
                echo "<br>";

            } else {
                echo "Er is een fout opgetreden.";
            }
        }
    }
    echo "<br>";
    echo "<td>" . "<a href='index.php'>Terug naar overzicht</a>" . "</td>";
} catch(PDOException $e) {
    die("Error!: " . $e->getmessage());
}
?>
</body>
</html>
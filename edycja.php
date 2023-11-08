<!DOCTYPE html>
<html lang="pl">
    <head></head>
    <body>

    <form action="#" method="get">
        <label for="imie">Wpisz imię osoby z klasy: 
            <input type="text" name="imie" id="imie">
        </label><br>
        <label for "nazwisko">Wpisz nazwisko osoby z klasy: 
            <input type="text" name="nazwisko" id="nazwisko">
        </label><br>
        <label for="data">Wybierz datę urodzenia: 
            <input type="text" name="data_urodzenia" id="data_urodzenia">
        </label><br>
        <button type="submit" name="submit" value="edycja">Edytuj dane w bazie</button>
    </form>
    <table>
<?php
$db = "klasa";
$link = @mysqli_connect("localhost","root","",$db);

$wyswietlenie = "SELECT * FROM klasa";

$wynik = mysqli_query($link, $wyswietlenie);


while ($row = mysqli_fetch_assoc($wynik)) {
    echo "<tr>";
    echo "<td>" . $row['imie'] . "</td>";
    echo "<td>" . $row['nazwisko'] . "</td>";
    echo "<td>" . $row['data_urodzenia'] . "</td>";
    echo "</tr>";
}
$imie = $_GET['imie'];
$nazwisko = $_GET['nazwisko'];
$data_urodzenia = $_GET['data_urodzenia'];

$edytuj = isset($_GET['edytuj']) ? $_GET['edytuj'] : null;
if ($edytuj !== null) {
    $edytuj = "UPDATE klasa SET imie = $imie, nazwisko = $nazwisko, data_urodzenia = $data_urodzenia WHERE lp = $edytuj";
} 
mysqli_close($link);
?>
</body>
</html>
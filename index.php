<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="#" method="get">
        <label for="imie">Wpisz imię osoby z klasy: 
            <input type="text" name="imie" id="imie">
        </label>
        <label for "nazwisko">Wpisz nazwisko osoby z klasy: 
            <input type="text" name="nazwisko" id="nazwisko">
        </label>
        <label for="data">Wybierz datę urodzenia: 
            <input type="text" name="data_urodzenia" id="data_urodzenia">
        </label>
        <button type="submit" name="submit" value="Dodaj rekordy do bazy">Dodaj rekord do bazy</button>
    </form>
    
    <div class="wyswietlenie">
        <table>
            <tr>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>Data urodzenia</th>
                <th>Akcje</th>
            </tr>
        
    </div>

    <?php
$db = "klasa";
$link = @mysqli_connect("localhost","root","",$db);


$imie = $_GET['imie'];
$nazwisko = $_GET['nazwisko'];
$data_urodzenia = $_GET['data_urodzenia'];

if (strtotime($data_urodzenia) === false) {
    echo "Błąd: Nieprawidłowy format daty!";
} else {
    $data_urodzenia = date('Y-m-d', strtotime($data_urodzenia));

    $dodanie = "INSERT INTO klasa (imie, nazwisko, data_urodzenia) VALUES ('$imie', '$nazwisko', '$data_urodzenia')";

    $wyswietlenie = "SELECT * FROM klasa";

    $wynik = mysqli_query($link, $wyswietlenie);

}
if (mysqli_query($link, $dodanie)) {
    echo "Dodano nowy rekord do tabeli klasa!";
} else {
        echo "Błąd zapytania: " . mysqli_error($link);
}
while ($row = mysqli_fetch_assoc($wynik)) {
    
    echo "<tr>";
    echo "<td>" . $row['imie'] . "</td>";
    echo "<td>" . $row['nazwisko'] . "</td>";
    echo "<td>" . $row['data_urodzenia'] . "</td>";
    echo "<td>";
    echo "<a href='usuniecie.php?usun=" . $row['lp'] . "'>Usuń</a> ";
    echo "<a href='edycja.php?edytuj=" . $row['lp'] . "'>Edytuj</a>";
    echo "</td>";
    echo "</tr>";
}
  
    
    mysqli_close($link);

?>
</body>
</html>


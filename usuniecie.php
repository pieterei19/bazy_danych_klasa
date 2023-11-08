<?php
$db = "klasa";
$link = @mysqli_connect("localhost","root","",$db);

$usunId = isset($_GET['usun']) ? $_GET['usun'] : null;
    if ($usunId !== null) {
        $usunZapytanie = "DELETE FROM klasa WHERE lp = $usunId";
        if (mysqli_query($link, $usunZapytanie)) {
            echo "Usunięto rekord o LP $usunId z tabeli klasa!";
        } else {
            echo "Błąd zapytania: " . mysqli_error($link);
        }
    }
    mysqli_close($link);
?>
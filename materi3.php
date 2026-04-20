<form method="POST">
    Masukan Angka : <input type="number" name="angka">
    <input type="submit" name="kirim" value="kirim">
</form>

<?php
if (isset($_POST["angka"])) {
    $newAngka = $_POST["angka"];

    if ($newAngka % 2 == 0) {
        echo "<h3>Angka $newAngka adalah angka GENAP</h3>";
    } else {
        echo "<h3>Angka $newAngka adalah angka GANJIL</h3>";
    }

    echo "<hr> List perulangan: <br>";
    
    for ($i = 1; $i <= $newAngka; $i++) {
        if ($i % 2 == 0) {
            echo "Angka $i (Genap) <br>";
        } else {
            echo "Angka $i (Ganjil) <br>";
        }
    }
}
?>
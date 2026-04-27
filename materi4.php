
<from method="post">
    Angka 1: <input type="number" name="a"><br><br>
    Angka 2: <input type="number" name="a"><br><br>
    <input type="submit" value="Hitung">
</form>

<?php
if ($_SERVES["REQUEST_METHOD"] == "POST") {
    $a = $_POST['a'];
    $b = $_POST['b'];

    echo "<h3>Hasil;</h3>";
    echo "penjumlahan: ". ($a + $b). "<br>";
    echo "pengurangan: ". ($a + $b). "<br>";
    echo "perkalian: ". ($a + $b). "<br>";

    if ($b != 0) {
        echo "pembagian: ". ($a / $b)."<br>";
    } else {
        echo "pembagian: tidak bisa dibagi dengan nol";
    }
}
?>
<?php

$nama = "adyw";
$umur = 22;
$tinggi = 165;
$menikah = true;
$hobi = ["membaca", "olahraga", "maingamr"];

echo "nama saya $nama, umur saya $umur, tinggi saya $tinggi cm, statu saya $menikah, hobi saya $hobi[0] , $hobi[1] , $hobi[2]";

echo "<br><br>=======================<br><br>";

//OPERATOR
$nilai1 = 5;
$nilai2 = 8;
$nilai3 = 10;
$nilai4 = 20;
$nilai5 = 13;

$hasil = $nilai1 + $nilai2 - $nilai3 * $nilai4 / $nilai5;

echo "hasil dari $nilai1 +  $nilai3 * $nilai4 / $nilai5 adalah $hasil";

echo "<br><br>=======================<br><br>";

//pecabangan

$nilai = 70;

if($nilai >= 85){
    echo "Grade A";
}  else if ($nilai >= 70) {
    echo "Grade B";
} else if ($nilai >= 50) {
    echo "Grade C";
}  else if ($nilai >= 30) {
    echo "Grade D";
} else {

}

?>
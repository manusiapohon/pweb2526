<?php

    $umur = 18;

    if ($umur <= 18 ){
        echo "Kamu tidak boleh membuka situs ini!";
    } else {
        echo "Selamat datang di website kami!";
    }



    $nilai = 100;

    if ($nilai > 100) {
        echo "<br>Anda salah memasukan nilai";
    } else {
        if ($nilai > 90) {
            $grade = "A+";
        } elseif($nilai > 80){
            $grade = "A";
        } elseif($nilai > 70){
            $grade = "B+";
        } elseif($nilai > 60){
            $grade = "B";
        } elseif($nilai > 50){
            $grade = "C+";
        } elseif($nilai > 40){
            $grade = "C";
        } elseif($nilai > 30){
            $grade = "D";
        } elseif($nilai > 20){
            $grade = "E";
        } else {
            $grade = "F";
        }

        echo "<br>Nilai anda: $nilai<br>";
        echo "Grade: $grade";
    }

    

?>
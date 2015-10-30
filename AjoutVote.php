<?php
/**
 * Created by PhpStorm.
 * User: 201250541
 * Date: 2015-10-29
 * Time: 16:48
 */
include_once "Fonction.php";
/*
 *
 * N'est plus utiliser ... devrait être enlever
 *
 */

if(isset($_POST['Animal'])){
    $animaux = GetValuesFromCSV("Animaux.csv");

    $animaux[$_POST['Animal']]+=1;
    WriteValuesToCSV("Animaux.csv",$animaux);
    HEADER("Location: index.php");
}
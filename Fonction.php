<?php
/**
 * Created by PhpStorm.
 * User: 201250541
 * Date: 2015-10-29
 * Time: 15:02
 */
function GetValuesFromCSV($path)
{

    if (($handle = fopen($path, 'a+')) !== FALSE) {
        $animaux = array();
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            list($Nope, $animaux[$data[0]]) = $data;

        }
        fclose($handle);
        return $animaux;

    }else{
        return false;
    }
}

function WriteValuesToCSV($path, $data){
    if (($handle = fopen($path, 'w+')) !== FALSE) {
        foreach($data as $key => $value){
            if(!empty($key)){
                fwrite($handle,$key.','.$value."\n");
            }

        }
        fclose($handle);

    }
}

function isCurrentFileName($Nom){
    return basename($_SERVER['REQUEST_URI'], '.php') == $Nom;
}

function MenuItemShouldBeActive(){

    if(func_num_args()>0)
    {
        foreach(func_get_args() as $nom){
            if(isCurrentFileName($nom)){
                return "active";
            }
        }
    }

    return "";
}

function WriteTitle()
{
    $Titre = basename($_SERVER['REQUEST_URI'], '.php');
    switch($Titre){
        case "index":
        case "MonAnimalPref":
            return "Résultats";
        break;
        default:
            return $Titre;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: 201250541
 * Date: 2015-10-29
 * Time: 14:55
 */

include "Fonction.php";

include "/Layout/Layout_Head.php";
?>


    <div class="container">
        <div class="row">
            <div class="col s12 ">
                <table class="striped bordered responsive-table">
                    <tr><th>Animal</th><th>Votes</th><th>Pourcentage de vote</th></tr>


                    <?php

                   /* if(isset($_COOKIE["Couleur"]))
                    {
                        $couleur = $_COOKIE["Couleur"];
                    }
                    else
                    {
                        $expiration = time() + (365*24*60*60);
                        setcookie("Couleur", "Blue", $expiration);
                    }*/
                    $animaux = GetValuesFromCSV("Animaux.csv");
                    //$couleur = "Blue";
                    $asdf="sadsd";
                    $compteur = 0;
                    if(count($animaux)>0){
                        foreach ($animaux as $key => $value){
                            if(($vide=!empty($value)) && !empty($key))
                            {
                                ?>
                                <tr>
                                    <td><?php echo $key; ?></td>
                                    <td><?php echo$value; ?></td>
                                    <td>
                                        <div class="col s10">
                                        <div class="meter-gauge">
                                            <span style="background-color: rgb( <?php echo GetGraphColor($couleur,$compteur,count($animaux)); $compteur++;  ?> );width:<?php echo round(($value/array_sum($animaux))*100,2,PHP_ROUND_HALF_EVEN); ?>%;"></span>
                                        </div>
                                        </div>
                                            <!--<meter value="<?php echo $value; ?>" min="0" max="<?php echo array_sum($animaux); ?>" ><?php echo $value/array_sum($animaux); ?> </meter>-->
                                        <span class="chip"><?php echo round(($value/array_sum($animaux))*100,2,PHP_ROUND_HALF_EVEN); ?>%</span>

                                    </td>
                                </tr>
                            <?php
                            }

                        }?>
                    <tr>
                        <th>Total</th>
                        <th><?php echo array_sum($animaux); ?></th>
                        <th></th>

                    </tr>
                    <?php
                    }
                    else{
                        ?>
                        <tr>
                            <td colspan="3"><h4>Aucune données disponible pour le moment...</h4></td>
                        </tr>
                    <?php
                    }


                    ?>
                </table>
            </div>
            <div class="col s12 l6">
                <form method="post">
                    <div class="card">
                        <div class="card-content">
                            <div class="container">
                                <div class="row">
                                    <div class="col s12 m4">
                                        <input class="with-gap" name="Couleur" type="radio"
                                    </div>
                                    <div class="col s12 m4">
                                    </div>
                                    <div class="col s12 m4">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include_once "/Layout/Layout_Foot.php";




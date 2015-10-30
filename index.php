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

                    $animaux = GetValuesFromCSV("Animaux.csv");

                    if(count($animaux)>0){
                        foreach ($animaux as $key => $value){
                            if(($vide=!empty($value)) && !empty($key))
                            {
                                ?>
                                <tr>
                                    <td><?php echo $key; ?></td>
                                    <td><?php echo$value; ?></td>
                                    <td>

                                        <meter value="<?php echo $value; ?>" min="0" max="<?php echo array_sum($animaux); ?>" ><?php echo $value/array_sum($animaux); ?> </meter>
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

            </div>
        </div>
    </div>

<?php include_once "/Layout/Layout_Foot.php";




<?php
/**
 * Created by PhpStorm.
 * User: 201250541
 * Date: 2015-10-29
 * Time: 15:57
 */
include "Fonction.php";
include "/Layout/Layout_Head.php";

$EssaiAjout=false;
//insertion dans les votes
if(isset($_POST['Animal'])){
    $animaux = GetValuesFromCSV("Animaux.csv");
    if(!array_key_exists($_POST['Animal'],$animaux) && isset($_POST['TB_Ajout'])){

        if($_POST['TB_Ajout']!="Ajout"){
            $animaux[$_POST['TB_Ajout']]=2;
            HEADER("Location: index.php");
        }
        else{
            $EssaiAjout=true;
        }

    }else{
        $animaux[$_POST['Animal']]+=1;
        HEADER("Location: index.php");
    }

    /*if($_POST['Animal']=="Ajout" && isset($_POST['HAjout']) && $_POST['HAjout'] == "true" && isset($_POST['TB_Ajout'])){
        echo "yep";
        $animaux[$_POST['TB_Ajout']]=2;
    }
    else{
        $animaux[$_POST['Animal']]+=1;
    }*/



    WriteValuesToCSV("Animaux.csv",$animaux);

}
?>
    <script src="Scripts/Vote.js" type="text/javascript"></script>
    <div class="container" >
        <div class="row">
            <div class="col s12 m8 l6 offset-m2 offset-l3">
                <?php
                if($EssaiAjout)
                {
                    ?>
                    <div class="chip red center-align">
                        Le mot "Ajout" ne peux être mis dans le vote ... et ces pas vraiment un animal de toute façons
                        <i class="material-icons">close</i>
                    </div>
                <?php
                }
                ?>
                <form name="vote" method="post">
                    <div class="card">
                        <div class="card-content">
                            <div class="container">
                                <div class="row">
                                    <div class="col s12 m8 offset-m2">
                                        <?php
                                        $animaux = GetValuesFromCSV("Animaux.csv");
                                        $FirstItem = true;
                                        foreach ($animaux as $key => $value){
                                            if(!empty($key)) {
                                                ?>
                                                <p >
                                                    <input class="with-gap" name="Animal" type="radio" id="<?php echo $key ?>" value="<?php echo $key ?>" <?php echo ($FirstItem? "checked":"") ?> />
                                                    <label for="<?php echo $key ?>"><?php echo $key ?></label>
                                                </p>
                                                <?php
                                                $FirstItem = false;
                                            }
                                        }
                                        ?>
                                        <p>
                                        <div class="row valign-wrapper">
                                            <div class="col s2 valign le">
                                                <input id="Ajout" class="with-gap center-align " name="Animal" value="Ajout" type="radio" >
                                                <label  for="Ajout" ></label>
                                            </div>
                                            <div class="col s10">
                                                <div class="input-field ">
                                                    <input placeholder="Ajout" id="TB_Ajout" name="TB_Ajout" type="text" class="validate" disabled>
                                                    <label for="TB_Ajout" ></label>
                                                </div>
                                            </div>

                                        </div>

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col s12 m6">
                                        <button class="btn waves-effect waves-light center-align" type="submit" name="action">Voter
                                            <i class="material-icons right">send</i>
                                        </button>
                                    </div>

                                    <div class="col s12 m6">
                                        <a class="waves-effect waves-teal btn-flat center-align" href="index.php">Résultats</a>
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
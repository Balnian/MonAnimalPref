/**
 * Created by 201250541 on 2015-10-29.
 */
$( document ).ready(function(){
    var RAjout = document.getElementById("Ajout");
    var TB_Ajout = document.getElementById("TB_Ajout");
    var HAjout = document.getElementById("HAjout");

    var rad = document.vote.Animal;
    var prev = null;
    for(var i = 0; i < rad.length; i++) {
        rad[i].onclick = function() {


            (prev)? console.log(prev.value):null;
            if(this !== RAjout) {
                //TB_Ajout.setAttributeNode("disabled");
                TB_Ajout.setAttribute("disabled","true");
                HAjout.setAttribute("disabled","false");
            }
            else{
                TB_Ajout.removeAttribute("disabled");
                HAjout.setAttribute("disabled","true");
            }
        }
            console.log(this.value)
        };
});



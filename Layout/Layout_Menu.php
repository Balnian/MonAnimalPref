<?php
/**
 * Created by PhpStorm.
 * User: 201250541
 * Date: 2015-10-29
 * Time: 16:04
 */
?>
<script>
    $( document ).ready(function(){
        $(".button-collapse").sideNav();
    });

</script>
<nav>
    <div class="nav-wrapper">
        <a href="#!" class="brand-logo center">MonAnimalPref</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="left hide-on-med-and-down">
            <li class=" <?php echo MenuItemShouldBeActive("index","MonAnimalPref") ?>"><a href="index.php">Résultats</a></li>
            <li class=" <?php echo MenuItemShouldBeActive("Vote") ?>"><a href="Vote.php">Voter</a></li>

        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a href="index.php">Résultats</a></li>
            <li><a href="Vote.php">Voter</a></li>
        </ul>
    </div>
</nav>
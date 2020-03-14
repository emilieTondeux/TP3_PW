
<?php

require "tp3-helpers.php";
if(isset($_GET['id'])){
    $ID_Actor = $_GET['id'];
} else {
    $ID_Actor = 109;
}
function actor_name($ID) {
    $JSON_Name = tmdbget("person/".$ID);
    $Tab_Name = json_decode($JSON_Name,TRUE);
    return $Tab_Name['name'];
}

function display_filmo($ID_Actor) {
    $JSON_Actor = tmdbget("person/".$ID_Actor."/credits");
    $Tab_Actor = json_decode($JSON_Actor,TRUE);
    $Tab_Cast = $Tab_Actor['cast'];
    foreach($Tab_Cast as $Filmo) {
        echo "<div class='film'>";
        echo "Film : ".$Filmo['title']."<br/>";
        echo "Rôle : ".$Filmo['character']."<br/>";
        echo "<br/>";
        echo "</div>";
    }
}
?>
<html>
    <link rel="stylesheet" href="Liste_Film.css" />
    <div class='deb'>
    Acteur : <?php echo actor_name($ID_Actor) ?> <br/><br/>Filmographie :</div><br/>
    <?php display_filmo($ID_Actor) ?>
</html>

<?php

require "tp3-helpers.php";

$ID_Actor = $_GET['id'];
$JSON_Name = tmdbget("person/".$ID_Actor);
$Tab_Name = json_decode($JSON_Name,TRUE);
echo "Acteur : ".$Tab_Name['name']."<br/>";
echo "<br/>";
$JSON_Actor = tmdbget("person/".$ID_Actor."/credits");
$Tab_Actor = json_decode($JSON_Actor,TRUE);
$Tab_Cast = $Tab_Actor['cast'];
foreach($Tab_Cast as $Filmo) {
    echo "Film : ".$Filmo['title']."<br/>";
    echo "Rôle : ".$Filmo['character']."<br/>";
    echo "<br/>";
}
?>

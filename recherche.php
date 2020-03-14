<?php

require "tp3-helpers.php";

$JSON_Collec = tmdbget("search/collection", ["query"=> "The Lord Of The Rings Collection"]);
$Tab_Collec = json_decode($JSON_Collec,TRUE);
$ID_Collec = $Tab_Collec["results"][0]["id"];
$JSON_Search = tmdbget("search/movie", ["query" => "The Lord Of The Rings"]);
$Tab_Search = json_decode($JSON_Search, TRUE);

<<<<<<< HEAD
$tab = $output["results"];
foreach($tab as $elem) {
    $ID = $elem['id'];
    $JSON2 = tmdbget("movie/".$ID."/credits");
    $output2 = json_decode($JSON2, TRUE);
    $cast = $output2['cast'];
    echo "Id : ".$elem['id']."<br/>";
    echo "Date de sortie : ".$elem['release_date']."<br/>";
    echo "Titre : ".$elem['title']."<br/>";
	foreach($cast as $elem2) {
		$ID = $elem2['id'];
		echo "Name : ".$elem2['name']."<br/>";
	    echo "Rôle : ".$elem2['character']."<br/>";
	}

    echo "<br/>";
=======
$Tab_Result = $Tab_Search["results"];
foreach($Tab_Result as $Movies) {
    $ID_Movie = $Movies['id'];
    $JSON_Movie = tmdbget("movie/".$ID_Movie);
    $Tab_Movie = json_decode($JSON_Movie,TRUE);
    if(isset($Tab_Movie["belongs_to_collection"])) {
        if($Tab_Movie["belongs_to_collection"]['id'] == $ID_Collec) {
            echo "Id : ".$Movies['id']."<br/>";
            echo "Date de sortie : ".$Movies['release_date']."<br/>";
            echo "Titre : ".$Movies['title']."<br/>";
            echo "<br/>";
            $JSON_Credits = tmdbget("movie/".$ID_Movie."/credits");
            $Tab_Credits = json_decode($JSON_Credits, TRUE);
            $Tab_Cast = $Tab_Credits['cast'];
            foreach($Tab_Cast as $Actor){
                $ID_Actor = $Actor['id'];
                $JSON_Actor = tmdbget("person/".$ID_Actor."/credits");
                $Tab_Actor = json_decode($JSON_Actor,TRUE);
                $Nb_Film = sizeof($Tab_Actor['cast']);
                echo "Nom : <a href=\"http://localhost/PW/TP3/TP3_PW/Liste_Film.php?id=".$ID_Actor."\">".$Actor['name']."</a><br/>";
                echo "Role : ".$Actor['character']."<br/>";
                echo "Nombre de films : ".$Nb_Film."<br/>";
                echo "<br/>";
            }
            echo "<br/>";
            echo "<br/>";
        }
    }
>>>>>>> 03e3c53d3c3d53257649976f221bc22daa51669a
}

 ?>


    <?php

    require "tp3-helpers.php";

    /* Donne l'id de la collection correspondant à la recherche d'une
    collection ayant pour nom $nom
    */
    function get_collec_id($nom) {
        $JSON_Collec = tmdbget("search/collection", ["query"=> $nom]);
        $Tab_Collec = json_decode($JSON_Collec,TRUE);
        $ID_Collec = $Tab_Collec["results"][0]["id"];
        return $ID_Collec;
    }

    /*Effectue une recherche des films à partir du critère $nom
    */
    function get_movies($nom) {
        $JSON_Search = tmdbget("search/movie", ["query" => $nom]);
        $Tab_Search = json_decode($JSON_Search, TRUE);
        $Tab_Result = $Tab_Search["results"];
        return $Tab_Result;
    }

    /*Affiche le nom des acteur d'un film avec un lien pour aller à sa filmographie
    ainsi que le rôle qu'il joue dans le film ainsi que le nombre de film dans
    lequel il a joué.
    */

    function display_actors($ID) {
        $JSON_Credits = tmdbget("movie/".$ID."/credits");
        $Tab_Credits = json_decode($JSON_Credits, TRUE);
        $Tab_Cast = $Tab_Credits['cast'];
        foreach($Tab_Cast as $Actor){
            echo "<div class='actor'>";
            $ID_Actor = $Actor['id'];
            $JSON_Actor = tmdbget("person/".$ID_Actor."/credits");
            $Tab_Actor = json_decode($JSON_Actor,TRUE);
            $Nb_Film = sizeof($Tab_Actor['cast']);
            echo "Nom : <a href=\"http://localhost/PW/TP3/TP3_PW/Liste_Film.php?id=".$ID_Actor."\">".$Actor['name']."</a><br/>";
            echo "Role : ".$Actor['character']."<br/>";
            echo "Nombre de films : ".$Nb_Film."<br/>";
            echo "<br/>";
            echo "</div>";
        }
    }

    /*Affiche
    l'id du film, sa date de sortie, son titre.
    $Movies vient du tableau d'un résultat  de rechecherche.
    */

    function display_movie($Movies) {
        echo "<div class='general'>";
        echo "Id : ".$Movies['id']."<br/>";
        echo "Date de sortie : ".$Movies['release_date']."<br/>";
        echo "Titre : ".$Movies['title']."<br/>";
    }
    /*Affiche les films de la collection ID Collection trouvé après la recherche
    qui a retourné $Tab_Result. Affiche le casting de chaque film.
    */
    function show_movies($Tab_Result,$ID_Collec) {
        foreach($Tab_Result as $Movies) {
            $ID_Movie = $Movies['id'];
            $JSON_Movie = tmdbget("movie/".$ID_Movie);
            $Tab_Movie = json_decode($JSON_Movie,TRUE);
            if(isset($Tab_Movie["belongs_to_collection"])) {
                if($Tab_Movie["belongs_to_collection"]['id'] == $ID_Collec) {
                    display_movie($Movies);
                    display_actors($Movies['id']);
                    echo "<br/>";
                    echo "<br/>";
                    echo "<br/>";
                    echo "</div>";

                }
            }
        }
    }
    ?>


<html>
    <link rel="stylesheet" href="recherche.css" />
    <?php
    $ID_Collec = get_collec_id("The Lord Of The Ring Collection");
    $Tab_Result = get_movies("The Lord Of The Ring");
    show_movies($Tab_Result,$ID_Collec);

    ?>
</html>

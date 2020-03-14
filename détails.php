<html>
	<link rel="stylesheet" href="details.css" />
	<?php
	require "tp3-helpers.php";
	$ID = 123;

	//Requête dans les 3 langues demandées.
	$JSON_original = tmdbget("movie/".$ID, null);
	$JSON_fr = tmdbget("movie/".$ID, ['language' => 'fr']);
	$JSON_en = tmdbget("movie/".$ID, ['language' => 'en']);

	//Transformation en array.
	$tab_original = json_decode($JSON_original, TRUE);
	$tab_fr = json_decode($JSON_fr, TRUE);
	$tab_en = json_decode($JSON_en, TRUE);

	//Affiche les paramètre demandés pour un langage donné.
	function affiche_description_fr($ID, $tab_fr, $tab_en){
		echo "Titre : ".$tab_fr["title"]."<br/>";
		echo "Titre original : ".$tab_en["original_title"]."<br/>";
		if(isset($tab_en['tagline'])) { // On vérifie l'existence.
		    echo "Tags : ".$tab_en['tagline']."<br/>";
		}
		echo "Description : ".$tab_fr['overview']."<br/>";
		echo "Lien : <a href=\"https://www.themoviedb.org/movie/".$ID."\" >".$tab_en['title']." </a><br/><br/>" ;
	}

	//Affiche les paramètre demandés dans un tableau pour les 3 langages demandés.
	function affiche_tab_description($ID, $tab_fr, $tab_en, $tab_original){
		echo "<table>
		  <th>
		    <td class='categ'>Original</td>
		    <td class='categ'>Francais</td>
		    <td class='categ'>Anglais</td>
		  </th>
		  <tr>
		    <td class='categ'>Titre</td>
		    <td>".$tab_original['title']."</td>
		    <td>".$tab_fr['title']."</td>
		    <td>".$tab_en['title']."</td>
		  </tr>
		  <tr>
		  <td class='categ'>Titre original</td>
		  <td>".$tab_original['original_title']."</td>
		  <td>".$tab_fr['original_title']."</td>
		  <td>".$tab_en['original_title']."</td>
		  </tr>
		  <tr>
		  <td class='categ'>Tags</td>";
		  if(isset($tab_original['tagline'])) {
		      echo "<td>".$tab_original['tagline']."</td>";
		  }else{
			  echo "<td>&nbsp;</td>";
		  }

		  if(isset($tab_fr['tagline'])) {
		      echo "<td>".$tab_fr['tagline']."</td>";
		  }else{
			   echo "<td>&nbsp;</td>";
		  }

		  if(isset($tab_en['tagline'])) {
		      echo "<td>".$tab_en['tagline']."</td>";
		  }else{
			  echo "<td>&nbsp;</td>";
		  }
		  echo "</tr>
		  </tr>
		  <tr>
		   <td class='categ'>Description</td>
		   <td>".$tab_original['overview']."</td>
		   <td>".$tab_fr['overview']."</td>
		   <td>".$tab_en['overview']."</td>
		 </tr>
		  <tr>
		    <td class='categ'>Lien vers le film</td>
		    <td><a href=\"https://www.themoviedb.org/movie/".$ID."\" >".$tab_original['title']." </a></td>
		    <td><a href=\"https://www.themoviedb.org/movie/".$ID."\" >".$tab_fr['title']." </a></td>
		    <td><a href=\"https://www.themoviedb.org/movie/".$ID."\" >".$tab_en['title']." </a></td>
		  </tr>
		  <tr>
			<td class='categ'>Image</td>
			<td> <img src =\" https://image.tmdb.org/t/p/w200/".$tab_original['poster_path']."\"></td>
			<td> <img src =\" https://image.tmdb.org/t/p/w200/".$tab_fr['poster_path']."\"></td>
			<td> <img src =\" https://image.tmdb.org/t/p/w200/".$tab_en['poster_path']."\"></td>
		  </tr>
		</table>";
	}
	function affiche_vid($ID) {
		//Obtention du JSON
		$JSON_video = tmdbget("movie/".$ID."/videos");
		//Transformation en tableau
		$Tab_video = json_decode($JSON_video,TRUE);
		//Lecture des résultats
		$List_vid = $Tab_video['results'];
		foreach($List_vid as $vid) {
			if($vid['type'] = 'Trailer') {
				$link = "https://www.youtube.com/embed/".$vid['key'];
				echo '<iframe width="560" height="315" src="' . $link . '" frameborder="0" allowfullscreen></iframe>';
				echo "<br/>";
				echo "<br/>";
				echo "<br/>";
				echo "<br/>";
			}
		}
	}
	?>
	<h3>Question 4</h3><br/>
	<?php affiche_description_fr($ID, $tab_fr, $tab_en); ?>
	<h3>Question 5</h3><br/>
	<?php affiche_tab_description($ID, $tab_fr, $tab_en, $tab_original); ?>
	<br/><br/>
	<h3>Question 10</h3><br/>
	<?php affiche_vid($ID); ?>
 </html>

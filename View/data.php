<?php require_once '../Controller/projC.php';
require_once '../Controller/salleC.php';
$pdo = new PDO("mysql:host=localhost;dbname=filmopia",'root','',);
$salleC = new salleC();
if(isset($_POST["action"]))
{
	if($_POST["action"] == 'insert')
	{
		$data = array(
			':id_salle'		=>	$_POST["id_salle"],
			':h_proj' 		=>	$_POST["h_proj"],
			':id_film' 		=>	$_POST["id_film"],
			':date_proj'	 =>	$_POST["date_proj"]
		);

		$query = "INSERT INTO projections (id_salle,h_proj,id_film,date_proj) VALUES (:id_salle,:h_proj,:id_film,:date_proj)";

		$statement = $pdo->prepare($query);

		$statement->execute($data);

		echo 'done';
	}

	if($_POST["action"] == 'fetch')
	{
		$query = "SELECT id_salle, COUNT(id_proj) AS Total FROM projections GROUP BY id_salle";

		$statement = $pdo->prepare($query);

		$statement->execute();

		$data = array();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
			$salle = $salleC->recuperersalle($row["id_salle"]);

			$data[] = array(
				'id_salle'		=>	$salle['nom_salle'],
				'total'			=>	$row["Total"],
				'color'			=>	'#' . rand(100000, 999999) . ''
			);
		}

		echo json_encode($data);
	}
}?>
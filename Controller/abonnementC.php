<?php
	include_once '../admin/partials/Config.php';
	include_once '../Model/abonnement.php';
	class abonnementC {


			//Abonnement
		
		/////..............................Afficher............................../////
				function AfficherAbonnement(){
					$sql="SELECT * FROM abonnement";
					$db = config::getConnexion();
					try{
						$liste = $db->query($sql);
						return $liste;
					}
					catch(Exception $e){
						die('Erreur:'. $e->getMessage());
					}
				}
		
		
		
		
				
		
		
		/////..............................Supprimer............................../////
				function SupprimerAbonnement($idab){
					$sql="DELETE FROM abonnement WHERE id_ab=:idab";
					$db = config::getConnexion();
					$req=$db->prepare($sql);
					$req->bindValue(':idab', $idab);   
					try{
						$req->execute();
					}
					catch(Exception $e){
						die('Erreur:'. $e->getMeesage());
					}
				}
		
		
		
		
		
		
		
		/////..............................Ajouter............................../////
				function AjouterAbonnement($abonnement){
					$sql="INSERT INTO abonnement (type,date_debut,date_expiration,id_user,pay_id) 
					VALUES (:type,:debut,:expiration,:iduser,:payid)";
					
					$db = config::getConnexion();
					try{
						$query = $db->prepare($sql);
						$query->execute([
							'type' => $abonnement->gettype(),
							'debut' => $abonnement->getdebut(),
							'expiration' => $abonnement->getexpiration(),
							'iduser' => $abonnement->getiduser(),
							'payid' => $abonnement->getpayid()
							
					]);			
					}
					catch (Exception $e){
						echo 'Erreur: '.$e->getMessage();
					}			
				}
		
		
		
		
		
		
		
		/////..............................Affichage par la cle Primaire............................../////
				function RecupererAbonnement($idab){
					$sql="SELECT * from abonnement where id_ab=$idab";
					$db = config::getConnexion();
					try{
						$query=$db->prepare($sql);
						$query->execute();
		
						$abonnement=$query->fetch();
						return $abonnement;
					}
					catch (Exception $e){
						die('Erreur: '.$e->getMessage());
					}
				}
				
		/////..............................Affichage par la cle Primaire............................../////
				function CheckAbonnementUser($idus){
					$sql="SELECT * from abonnement where id_user=$idus";
					$db = config::getConnexion();
					try{
						$query=$db->prepare($sql);
						$query->execute();
						if ($query->rowCount() == 0) {
						return true;
						}else{
							return false;
						}
		
					}
					catch (Exception $e){
						die('Erreur: '.$e->getMessage());
						return false;
					}
				}
				/////..............................Affichage par la cle Primaire............................../////
				function GetAbonnementUser($idus){
					$sql="SELECT * from abonnement where id_user=$idus";
					$db = config::getConnexion();
					try{
						$query=$db->prepare($sql);
						$query->execute();
		
						$abonnement=$query->fetch();
						return $abonnement;
		
					}
					catch (Exception $e){
						die('Erreur: '.$e->getMessage());
						return false;
					}
				}
		/////..............................Affichage par la cle Primaire............................../////
		function GetAbonnementType($idus){
			$sql="SELECT * from abonnement where id_user=$idus";
			$db = config::getConnexion();
				$query=$db->prepare($sql);
				$query->execute();

				$abonnement=$query->fetch();
				$idab=$abonnement['type'];
				$sql="SELECT * from abonnement where id_ab=$idab";
				$query=$db->prepare($sql);
				$query->execute();
				$categ=$query->fetch();
		return $categ['id_typeabon'];
			
		}
		/////..............................search............................../////
				/*function Recherche($marqueP){
					$sql="SELECT * from abonnement where marque like '".$marqueP."%' ";
					$db = config::getConnexion();
					try{
						$liste = $db->query($sql);
						return $liste;
					}
					catch(Exception $e){
						die('Erreur:'. $e->getMessage());
					}
				}
		*/
		
		/////..............................tri............................../////
		function triAbonnement(){
			$sql="SELECT * FROM abonnement order by type ASC";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		
		/////..............................Update............................../////
				function ModifierAbonnement($abonnement, $id){
					$db = config::getConnexion();
					try {
				$query = $db->prepare('UPDATE abonnement SET  type = :type, date_debut = :debut, date_expiration = :expiration, id_user = :iduser, pay_id = :payid   WHERE id_ab= :idab');
						$query->execute([
							'type' => $abonnement->gettype(),
							'debut' => $abonnement->getdebut(),
							'expiration' => $abonnement->getexpiration(),
							'iduser' => $abonnement->getiduser(),
							'idab' => $id,
							'payid' => $abonnement->getpayid()
						]);
					} catch (PDOException $e) {
						$e->getMessage();
					}
				}
		
				// TYPE ABONNEMENT
				/////..............................Afficher............................../////
				function AfficherCategorie(){
					$sql="SELECT * FROM typeabon";
					$db = config::getConnexion();
					try{
						$liste = $db->query($sql);
						return $liste;
					}
					catch(Exception $e){
						die('Erreur:'. $e->getMessage());
					}
				}
		
		/////..............................Supprimer............................../////
				function SupprimerCategorie($id_typeabon){
					$sql="DELETE FROM typeabon WHERE id_typeabon=:id_typeabon";
					$db = config::getConnexion();
					$req=$db->prepare($sql);
					$req->bindValue(':id_typeabon', $id_typeabon);   
					try{
						$req->execute();
					}
					catch(Exception $e){
						die('Erreur:'. $e->getMeesage());
					}
				}
		
		/////..............................Ajouter............................../////
				function AjouterCategorie($typeabon){
					$sql="INSERT INTO typeabon (label_typeabon,prix_typeabon,icon_typeabon) 
					VALUES (:label_typeabon,:prix_typeabon,:icon_typeabon)";
					
					$db = config::getConnexion();
					try{
						$query = $db->prepare($sql);
						$query->execute([
							'label_typeabon' => $typeabon->getlabel(),
							'prix_typeabon' => $typeabon->getprix(),
							'icon_typeabon' => $typeabon->geticon()
					]);			
					}
					catch (Exception $e){
						echo 'Erreur: '.$e->getMessage();
					}			
				}
		
				/////..............................Update............................../////
				function ModifierCategorie($typeabon, $id){
					$db = config::getConnexion();
					try {
				$query = $db->prepare('UPDATE typeabon SET label_typeabon = :label_typeabon, prix_typeabon = :prix_typeabon, icon_typeabon = :icon_typeabon WHERE id_typeabon = :id_typeabon');
						$query->execute([
							'label_typeabon' => $typeabon->getlabel(),
							'id_typeabon' => $id,
							'prix_typeabon' => $typeabon->getprix(),
							'icon_typeabon' => $typeabon->geticon()
						]);
					} catch (PDOException $e) {
						$e->getMessage();
					}
				}
				
			function RecupererCategorie($id_typeabon){
				$sql="SELECT * from typeabon where id_typeabon=$id_typeabon";
				$db = config::getConnexion();
				try{
					$query=$db->prepare($sql);
					$query->execute();
		
					$categorie=$query->fetch();
					return $categorie;
				}
				catch (Exception $e){
					die('Erreur: '.$e->getMessage());
				}
			}
		}
?>

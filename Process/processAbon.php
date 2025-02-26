<?php
	include '../Controller/abonnementC.php';
    if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
	$abonnementC=new abonnementC();

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data); 
    return $data;
}

if(isset($_POST['ajouter'])){
    if (isset($_POST["DateStart"]) &&
    isset($_POST["DateEnd"]) &&
    isset($_POST["selectUser"]) &&
    isset($_POST["selectType"])) {
    if (
        !empty($_POST['DateStart']) &&
        !empty($_POST["DateEnd"]) &&
        !empty($_POST["selectUser"]) &&
        !empty($_POST["selectType"])
    ) {
        $abonnement = new abonnement(
            null,
            test_input($_POST['selectType']),
            test_input($_POST['DateStart']),
            test_input($_POST['DateEnd']),
            test_input($_POST['selectUser'])
        );
        $abonnementC->AjouterAbonnement($abonnement);
        $_SESSION['message'] ="Record has been saved!";
        $_SESSION['msg_type'] = "success";
        header('Location: http://localhost/netninjaclass/View/afficherAbon.php');
    } else
        $_SESSION['message'] = "Missing information";
        $_SESSION['msg_type'] = "warning";
    }
}

if(isset($_GET['delete'])){
    $idab = test_input($_GET['delete']);

    $abonnementC->SupprimerAbonnement($idab);
    $_SESSION['message'] = "Successfully Deleted ".$idab." !";
    $_SESSION['msg_type'] = "danger";
    header("location: http://localhost/netninjaclass/View/afficherAbon.php");
}
    if(isset($_POST['modifier'])){
        var_dump($_POST);
        if (
            isset($_POST["id_abon"]) && 
            isset($_POST["DateStart"]) &&
            isset($_POST["DateEnd"]) &&
            isset($_POST["selectUser"]) &&
            isset($_POST["selectType"])) {
        if (
            !empty($_POST["id_abon"]) && 
            !empty($_POST['DateStart']) &&
            !empty($_POST["DateEnd"]) &&
            !empty($_POST["selectUser"]) &&
            !empty($_POST["selectType"])
        ) {
            $abonnement = new abonnement(
                null,
                test_input($_POST['selectType']),
                test_input($_POST['DateStart']),
                test_input($_POST['DateEnd']),
                test_input($_POST['selectUser'])
            );
            $abonnementC->ModifierAbonnement($abonnement,$_POST["id_abon"]);
            $_SESSION['message'] ="Record has been modified!";
            $_SESSION['msg_type'] = "primary";
            header('Location: http://localhost/netninjaclass/View/ajoutAbon.php?id_abon='.$_POST["id_abon"]);
        } else
            $_SESSION['message'] = "Missing information";
            $_SESSION['msg_type'] = "warning";
            header('Location: http://localhost/netninjaclass/View/ajoutAbon.php?id_abon='.$_POST["id_abon"]);
        }
    }
/*
$output =$result= "";
if(isset($_GET['query'])){
        $search = $_GET['query'];
        $result = $prodCtrl->liveSearch($search);
}
else{
    $result = $prodCtrl->getAllProd($_GET['page']);
}

if(count($result)>0){
    $output ="<thead>
    <th scope='col'></th>
    <th scope='col'>Cathégorie</th>
    <th scope='col'>Désignation</th>
    <th scope='col'>Marque</th>
    <th scope='col'>Quantité</th>
    <th scope='col'>Prix Achat</th>
    <th scope='col'>Prix vente</th>
    <th scope='col'>Disponibilité</th>
    <th scope='col'>Action</th>
    </thead>
    <tbody>";
    $i =1;
    foreach($result as $result){
        $output .="
        <tr>
        <td>".$i++."</td>
                <td> ".$result['cathegorie']."</td>
                <td> ".$result['designation']."</td>
                <td> ".$result['marque']."</td>
                <td> ".$result['quantiteStock']."</td>
                <td> ".$result['prix_achat']."</td>
                <td> ".$result['prix_vente']."</td>
                <td>
                    <a href='../../public/util/processProd.php?delete=".$result['id_produit']."'>
                        <i class=far fa-edit'></i>
                    </a>
                    <a href='../../public/util/processProd.php?delete=".$result['id_produit']."'>
                        <i class='fas fa-trash-alt' style='color:#33b35a'></i>  
                    </a>
                </td>
        </tr>
        ";    
    }
    $output .= "</tbody>";
    echo $output;
}else{
    echo "<h3>Not record found</h3>";
}

*/
?>
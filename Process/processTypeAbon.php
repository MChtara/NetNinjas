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
    if (isset($_POST["Labelabon"]) && isset($_POST["Prixabon"])
    && isset($_POST["Iconabon"])) {
        if (
            !empty($_POST['Labelabon']) && !empty($_POST['Prixabon'])
            && !empty($_POST["Iconabon"])
    ) {
        $typeabon = new typeabon(
            null,
            test_input($_POST['Labelabon']),
            test_input($_POST['Prixabon']),
            test_input($_POST["Iconabon"])
        );
        $abonnementC->AjouterCategorie($typeabon);
        $_SESSION['message'] ="Record has been saved!";
        $_SESSION['msg_type'] = "success";
        header('Location: http://localhost/netninjaclass/View/afficherTypeAbon.php');
    } else
        $_SESSION['message'] = "Missing information";
        $_SESSION['msg_type'] = "warning";
        header('Location: http://localhost/netninjaclass/View/ajoutTypeAbon.php');
    }
}

if(isset($_GET['delete'])){
    $idab = test_input($_GET['delete']);

    $abonnementC->SupprimerCategorie($idab);
    $_SESSION['message'] = "Successfully Deleted ".$idab." !";
    $_SESSION['msg_type'] = "danger";
    header("location: http://localhost/netninjaclass/View/afficherTypeAbon.php");
}
    if(isset($_POST['modifier'])){
        if (isset($_POST["id_typeabon"]) && 
        isset($_POST["Labelabon"]) && isset($_POST["Prixabon"])
        && isset($_POST["Iconabon"])) {
            if (!empty($_POST["id_typeabon"]) && 
            !empty($_POST['Labelabon']) && !empty($_POST['Prixabon'])
            && !empty($_POST["Iconabon"])) {
                $typeabon = new typeabon(
                    null,
                    test_input($_POST['Labelabon']),
                    test_input($_POST['Prixabon']),
                    test_input($_POST["Iconabon"])
                );
            $abonnementC->ModifierCategorie($typeabon,$_POST["id_typeabon"]);
            $_SESSION['message'] = "Record has been modified!";
            $_SESSION['msg_type'] = "primary";
            header('Location: http://localhost/netninjaclass/View/ajoutTypeAbon.php?id_typeabon='.$_POST["id_typeabon"]);
        } else
            $_SESSION['message'] = "Missing information";
            $_SESSION['msg_type'] = "warning";
            header('Location: http://localhost/netninjaclass/View/ajoutTypeAbon.php?id_typeabon='.$_POST["id_typeabon"]);
        }
    }
?>
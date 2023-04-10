<?php

include '../Controller/categorieC.php';

$error = "";

// create categorie
$categorie = null;

// create an instance of the controller
$categorieC = new categorieC();
if (isset($_POST["nom_cat"])) 
{
  if (!empty($_POST["nom_cat"]))
  {
    $categorie = new categorie(null, $_POST['nom_cat']);
    $categorieC->addCategorie($categorie);
    header('Location: list_categorie.php');
  } else {
    $error = "Missing information";
  }
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <a href="list_categorie.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table border="1" align="center">

            <tr>
                <td>
                    <label for="nom_cat">Nom du Categorie</label>
                </td>
                <td><input type="text" name="nom_cat" id="nom_cat" maxlength="20"></td>
            </tr>
           
            <tr align="center">
                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>
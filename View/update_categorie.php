<?php

include '../Controller/categorieC.php';

$error = "";

// create categorie
$categorie = null;

// create an instance of the controller
$categorieC = new categorieC();
if (
    isset($_POST["id_cat"]) &&
    isset($_POST["nom_cat"])
) {
    if (
        !empty($_POST["id_cat"]) &&
        !empty($_POST["nom_cat"])
    ) {
        $categorie = new categorie($_POST['id_cat'], $_POST['nom_cat']);
        $categorieC->updateCategorie($categorie, $_POST['id_cat']);
        header('Location:list_categorie.php');
    } else
        $error = "Missing information";
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="list_categorie.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_cat'])) {
        $categorie = $categorieC->showCategorie($_POST['id_cat']);

    ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                    <label for="id_cat">Id Categorie </label>
                    </td>
                    <td><input type="text" name="id_cat" id="id_cat" value="<?php echo $categorie['id_cat']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="nom_cat">Nom Categorie </label>
                    </td>
                    <td><input type="text" name="nom_cat" id="nom_cat" value="<?php echo $categorie['nom_cat']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Update">
                    </td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
</body>

</html>
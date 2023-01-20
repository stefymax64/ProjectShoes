<?php
include ("database/connexion.inc.php");
include ("database/prepare_query.inc.php");
// 8_Créer la suppression des données du formulaire

if(isset($_GET["form_id"]) && !empty($_GET["form_id"])){    // Variables exisent  et champs non vide ?
    $form_id = $_GET["form_id"];
    if(is_numeric($form_id) && $form_id > 0){   //Use is_numeric not is_integer pour tester si string is number
        $form_id = (int)$form_id; //convert string to int
        $mysqli = db_connect();
        if($mysqli){
            $error = "";
            if(delete_shoe($mysqli,$form_id,$error)){
                $form_message = "La chaussure à été supprimée !";
            }
            else{
                $form_message = $error;
            }
        }
        else{
            $form_message = "Erreur database connexion";
        }
    }
    else{
        $form_message = "L'identifiant doit etre un nombre entier positif";
    }

}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Boutique de chaussures</title>
</head>
<body>
    <?php include("menu.php") ?>
    <?php echo "<h1>Boutique de chaussures</h1>"; ?>
    <?php echo "<h2> Supprimer une chaussure</h2>"; ?>
    <!-- 6_Créer le formulaire de suppression d'un article -->
    <form action="<?= $_SERVER["PHP_SELF"]?>" method="get">
    <label for="form_id">Identifiant produit</label>
    <input type="number" name="form_id" id="form_id">

    <input type="submit" value="Supprimer la chaussure" >
    </form>
    <!-- 9_Affiche le message -->
    <p><?= isset($form_message)? $form_message:null ?></p>

</body>
</html>
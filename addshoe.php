<?php 
// 5_Créer la réception des données du formulaire
include ("database/connexion.inc.php");
include ("database/prepare_query.inc.php");

//Mon code
// if(isset($_POST["form_name"]) && !empty($_POST["form_name"])
//     && isset($_POST["form_price"]) && !empty($_POST["form_price"])){
        
//         //Appel la connexion à la BDD
//         $form_name = $_POST["form_name"];
//         $form_price = $_POST["form_price"];

//         //Connexion à la BDD
//         $mysqli = db_connect();

//         if(insert_shoe($mysqli, $form_name, $form_price,$error)){
//             $form_message = "La chaussure a bien été crée.";
//         }
//         else{
//             $form_message = $error;
//         }
// }

if(isset($_POST["form_name"]) && isset($_POST["form_price"])    // Variables exisent ?
     && !empty($_POST["form_name"]) && !empty($_POST["form_price"]) // Champs remplis ?
    ){
        //APPEL BDD
        $form_name = $_POST["form_name"];
        $form_price = $_POST["form_price"];
        if(is_numeric($form_price)){
            $mysqli = db_connect();            
            if($mysqli->connect_error == null){
                $error = "";
                if(insert_shoe($mysqli,$form_name,$form_price,$error)){
                    $form_message = "La chaussure à été crée !";
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
            $form_message = "Le prix doit être un nombre.";
        }
        
    }
?>

<!-- 2_Créer le formulaire d'ajout d'un article -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Boutique de chaussures</title>
</head>
<body>
    <?php include("menu.php") ?>
    <?php echo "<h1>Boutique de chaussures</h1>"; ?>
    <?php echo "<h2> Ajouter une chaussure</h2>"; ?>

        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
            <label for="form_name">Nom :</label>
            <input type="text" name="form_name" id="form_name" value="<?= isset($form_name)?$form_name:null?>" placeholder="ex: Adidas" required>
            <label for="form_price">Prix :</label>
            <input type="number" name="form_price" id="form_price" step="0.01" placeholder="0.00€" required>
            <input type="submit" value="Envoyer">
        </form>
        <!-- Ajout du message -->
        <p> <?= isset($form_message)?$form_message:null ?> </p>
</body>
</html>

<!-- Correction-->
<!-- include("database/connexion.inc.php");
    include("database/prepare_query.inc.php");

    if(isset($_POST["form_name"]) && isset($_POST["form_price"])    // Variables exisent ?
     && !empty($_POST["form_name"]) && !empty($_POST["form_price"]) // Champs remplis ?
    ){
        //APPEL BDD
        $form_name = $_POST["form_name"];
        $form_price = $_POST["form_price"];
        if(is_numeric($form_price)){
            $mysqli = db_connect();            
            if($mysqli->connect_error == null){
                $error = "";
                if(insert_shoe($mysqli,$form_name,$form_price,$error)){
                    $form_message = "La chaussure à été crée !";
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
            $form_message = "Le prix doit être un nombre.";
        }
        
    } -->
<!-- <?php include("menu.php")?> -->
<!--<h2>Ajouter une chaussure</h2>
<form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
    <label for="form_name">Nom :</label>
    <input type="text" name="form_name" id="form_name" required>
    <label for="form_price">Prix :</label>
    <input type="number" name="form_price" id="form_price" step="0.01" required>

    <input type="submit" value="Envoyer">
</form> -->
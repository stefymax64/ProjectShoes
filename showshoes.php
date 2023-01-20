<?php
include ("database/connexion.inc.php");
include ("database/prepare_query.inc.php");

// 13_Créer l'affichage des articles
$mysqli = db_connect();
    if($mysqli->connect_error == null){
        $error = "";
        $shoes = get_all_shoes($mysqli,$error);
        if($shoes){
            $form_message = count($shoes)." chaussure(s) trouvée(s) !";
        }
        else{
            $form_message = $error;
        }
    }
    else{
        $form_message = "Erreur database connexion";
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
    <!-- 12_Créer l'affichage en tableau des articles -->
    <section>
    <p><?= isset($form_message)?$form_message:$form_message?></p>
    <?php if(isset($shoes) && count($shoes) > 0): ?>
    <table>
        <tr><th>id</th><th>nom</th><th>prix</th><th>supprimer</th></tr>
        <?php
            foreach($shoes as $key=>$shoe){
                echo '<tr><td>'.$shoe['id'].'</td><td>'. $shoe["nom"].'</td><td>'.$shoe["prix"].'</td><td><a href="/Projet Chaussure/deleteshoe.php?form_id='.$shoe["id"].'">Supprimer</a></td></tr>';
            }
        ?>
        
    </table>
    <?php endif;?>
</section>
    

</body>
</html>
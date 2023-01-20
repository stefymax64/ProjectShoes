<?php
    // 4_Créer la fonction qui va insérer l'article dans la BDD
    //Mon code
    // function insert_shoe($mysqli, $name, $price, &$error_msg){
    //     if($mysqli instanceof mysqli == FALSE){
    //         throw new Exception('Une erreur s\'est produite');
    //     }
    //     if(!is_int($price)) {
    //         return FALSE;
    //     }
    //     if(is_numeric($price )){
    //         return FALSE;
    //     }

    //     //Activation du rapport d'erreur
    //     $driver = new mysqli_driver();
    //     $driver->report_mode = MYSQLI_REPORT_ALL;

    //     try{
    //         //Si la connexion échoue, une mysqli_sql_exception sera lancé
    //         $mysqli = new mysqli("localhost","adrar_boutique","u_adrar_boutique","u_adrar_boutique");
        
    //         //Requête préparée étape 1
    //         $pre_query = $mysqli->prepare("INSERT INTO `chaussures` (`id`, `nom`, `prix`, `created_at`) VALUES (NULL, ?, ?, current_timestamp())");
    //         //Requête préparée étape 2
    //         $name = "Nike";
    //         $price = 100;
    //         $pre_query->bind_param("sd",$name,$price);
    //         $pre_query->execute();
    //     }
    //     catch(mysqli_sql_exception $e){
    //         error_log($e->__toString());
    //     }
    // }

    function insert_shoe($mysqli,$name,$price,&$error_msg){
        if($mysqli instanceof mysqli == false){
            throw new Exception("Mysqli est pas de la classe mysqli !", 1);
        }
        if(!is_numeric($price)){
            $error_msg = "Le prix doit être un nombre";
            return false;
        }
        if(is_numeric($name)){
            $error_msg = "Le nom doit être un texte.";
            return false;
        }
    
        $prep_query = $mysqli->prepare("INSERT INTO `chaussures` (`id`, `nom`, `prix`, `created_at`) VALUES (NULL, ?, ?, current_timestamp()) ");
        if($prep_query == false){
            $error_msg = "Database erreur.";
            return false;
        }
    
        $res = $prep_query->bind_param("sd",$name,$price);
        if($res == false){
            $error_msg = "Database erreur";
            return false;
        }
        $res = $prep_query->execute();
        if($res == false){
            $error_msg = "Database erreur";
            return false;
        }
        return $res;
    }

    //7_Créer la fonction qui supprime un article
    function delete_shoe($mysqli,$id,&$error_msg){
        if($mysqli instanceof mysqli == false){
            throw new Exception("Mysqli est pas de la classe mysqli !", 1);
        }
        if(!is_integer($id) && $id > 0){
            $error_msg = "L'identifiant doit être un nombre entier positif";
            return false;
        }
        $prep_query = $mysqli->prepare("DELETE FROM `chaussures` WHERE `chaussures`.`id` = ?;");
        if($prep_query == false){
            $error_msg = "Database erreur.";
            return false;
        }
        $res = $prep_query->bind_param("i",$id);
        if($res == false){
            $error_msg = "Database erreur";
            return false;
        }
        $res = $prep_query->execute();
        if($res == false){
            $error_msg = "Database erreur";
            return false;
        }
        return $res;
    
    }

    // 10_Créer la fonction qui affiche tous les articles
    function get_all_shoes($mysqli,&$error_msg){
        if($mysqli instanceof mysqli == false){
            throw new Exception("Mysqli n'est pas de la classe mysqli !", 1);
        }
        $query = $mysqli->query("SELECT * FROM `chaussures`;");
        if($query == false){
            $error_msg = "Database erreur.";
            return false;
        }
        
        $shoes = $query->fetch_all(MYSQLI_ASSOC);
        return $shoes;
    }

?>

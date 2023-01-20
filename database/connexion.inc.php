<?php
    //MySQLi orienté objet
    function db_connect(){
        // Information de connexion
        define("DB_USERNAME", "u_adrar_boutique");
        define("DB_PASSWORD", "u_adrar_boutique");
        define("DB_DOMAIN", "localhost");
        define("DB_NAME", "adrar_boutique");
        
        // Création d'une connexion
        $mysqli = new mysqli(DB_DOMAIN,DB_USERNAME,DB_PASSWORD,DB_NAME);

        //Vérification de la connexion
        if($mysqli->connect_error){
            die("La connexion a échoué: " . $mysqli->connect_error);
        }
        else{
            echo "Connecté avec succès";
        }

        //Retour de l'objet 
        return $mysqli;
    }
?>

<!-- Correction

function db_connect(){
    define("DB_USERNAME","adrar_admin");
    define("DB_PASSWORD","adrar_password");
    define("DB_DOMAIN","localhost");
    define("DB_NAME","adrar_boutique");
    $mysqli = new mysqli(DB_DOMAIN,DB_USERNAME,DB_PASSWORD,DB_NAME);
    return $mysqli;
} -->

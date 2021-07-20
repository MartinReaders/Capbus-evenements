<?php



function estConnecter(){
    //role verifie si user est cconnecter
    //param non
    //retour true ou false

    if(isset($_SESSION["connect"]) and $_SESSION["connect"] === true){
        return true;
    }else{
        return false;
    }
}


function idUserConnecter(){
    //role recupere l'id user connecter
    //param non
    //retourn id user ou 0
    if(!estConnecter()){
        return 0;
    }
    if(isset($_SESSION["user"])){
        return $_SESSION["user"];
    }else{
        return 0;
    }
}


function UserConnect(){
    
    global $utilisatuer;
    if(!isset($utilisatuer)){
        $utilisatuer = user(idUserConnecter());
    }

    return $utilisatuer;
}


function deconnecte(){
    $_SESSION["connect"] = false;
}


function connect($utilisatuer){
    $_SESSION["connect"] = true;
    $_SESSION["user"] = $utilisatuer->get("id");
    $GLOBALS["utilisatuer"] = $utilisatuer;
}
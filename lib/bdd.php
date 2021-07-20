<?php

/* 
 *Gestion les base de donnes
 * les methodes : 
 *  BDDouverture()
 *  BDDselect
 *  BDDquery
 *  BDDlastId()
 */



function BDDouverture(){
    //role ouverture la base de donnes
    //paramtres non
    //Retour $bdd 
    //on prrend en global vatible bdd
    global $bdd;
    if(!isset($bdd)){
        include "lib/db_connect.php";
        $bdd = new PDO("mysql:host=$db_host;dbname=$db_nom;charset=UTF8", $db_user, $db_pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    }
    return $bdd;
}

function BDDselect($sql, $param){
    //role type de requette select
    //paramtres $sql la requete, $param les paramtresz a passe
    //rertour $req 
    
    //on ouver la base 
    $bdd = BDDouverture();
    
    //prepartion la requette
    $req = $bdd->prepare($sql);
    if($req->execute($param)=== false){
        echo "Errore de requette";
        print_r($param);
    }
    return $req;
}


function BDDquery($sql, $param){
    //role type de requette query
    //paramtres $sql la requete, $param les paramtresz a passe
    //rertour $req  les colone a efeccter
    
    //on ouver la base 
    $bdd = BDDouverture();
    $req = $bdd->prepare($sql);
    if($req->execute($param)=== false){
        echo "Erorre de requette " ;
        print_r($param);
        return -1;
    }
    return $req->rowCount();
    
}


function BDDlastId(){
    //role remonter le dernier id qui a ete touche
    //paramtres non
    //reorourn le denrier id a touche
    
    //ouverturte base de donnes
    $bdd = BDDouverture();
    return $bdd->lastInsertId();
}


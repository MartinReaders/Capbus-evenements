<?php


class events extends principal {
    protected $pk = "id"; //Cles primair
    protected $table = "event";  //table du classe
    protected $champs = ["id","date", "time", "online","description", "title","location","categorie","link","img"];
    protected $liens =["categorie"=>"categorie", "location"=>"location"]; 




    public function upload_image($nameImg){
        //Role upload image pour la colection
        //paramtres $nameFille  nom d'image

// Vérifie si le fichier a été uploadé sans erreur.
        if(isset($_FILES["$nameImg"]) && $_FILES["$nameImg"]["error"] == 0){
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png", "pdf"=>"iamge/pdf");
            $filename = $_FILES["$nameImg"]["name"];
            $filetype = $_FILES["$nameImg"]["type"];
            $filesize = $_FILES["$nameImg"]["size"];

            // Vérifie l'extension du fichier
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

            // Vérifie la taille du fichier - 5Mo maximum
            $maxsize = 5 * 1024 * 1024;
            if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");


        
            $chemin =  "upload/"  . time()  . $_FILES["$nameImg"]["name"];

                move_uploaded_file($_FILES["$nameImg"]["tmp_name"],$chemin );
                return $chemin;
    
                echo "Votre fichier a été téléchargé avec succès.";
            
            





        }
    }

    function create_slug($string){
        $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
        return $slug;
     }




     public function loadByID($pk){
        //role charger l'objet par pk
        //paramtes $pk - cles primaires
        //retour  true si reusiit false sinon
        $sql = "SELECT * FROM `{$this->table}` WHERE `id`=:pk";
        $param = [":pk"=>$pk];
        $req = BDDselect($sql, $param);
        $linge = $req->fetch(PDO::FETCH_ASSOC);
        if(!empty($linge)){
            $this->setFromTab($linge);
            return true;
        }else{
            $this->values[$this->pk] = 0;
            return false;
        }
        
    }
     
     
    
   
    public function listePagintaion($premier,$parpage){
        //Role affiche le liste 
        //paramtres $limite nb de limite dans le requete
        //retour tableu de result
        
        //definir les class
        $class = get_class($this);
        
        $sql ="SELECT * FROM `{$this->table}` WHERE `online`=1 ORDER BY `id` DESC LIMIT $premier, $parpage;";
        $param = [":premier"=>$premier, ":parpage"=>$parpage];
        $req = BDDselect($sql, $param);
        
        //tableu vide
        $result = [];
        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)){
            $class = new $class();
            $class->setFromTab($ligne);
            $result[$ligne["id"]] = $class;
        }
        
        return $result;
    }


    public function listeEvent(){
        //Role affiche le liste 
        //paramtres $limite nb de limite dans le requete
        //retour tableu de result
        
        //definir les class
        $class = get_class($this);
        
        $sql ="SELECT * FROM `{$this->table}` ORDER BY `id` WHERE `online`= 1";
        $param = [""];
        $req = BDDselect($sql, $param);
        
        //tableu vide
        $result = [];
        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)){
            $class = new $class();
            $class->setFromTab($ligne);
            $result[$ligne["id"]] = $class;
        }
        
        return $result;
    }





    public function CountAlEvent() {
        $sql ="SELECT COUNT(`id`) AS 'nb' FROM `{$this->table}` WHERE `online`= 1";
        $param = [];
        $req = BDDselect($sql, $param);
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        if($ligne === false){
            return 0;
        }else{
            return $ligne["nb"];
        }
    }



    
    public function listeCat($categorie){
        //Role affiche le liste 
        //paramtres $limite nb de limite dans le requete
        //retour tableu de result
        
        //definir les class
        $class = get_class($this);
        
        $sql ="SELECT * FROM `{$this->table}`  WHERE `categorie`=:categorie and `online`= 1 ORDER BY `id`";
        $param = [":categorie"=>$categorie];
        $req = BDDselect($sql, $param);
        
        //tableu vide
        $result = [];
        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)){
            $class = new $class();
            $class->setFromTab($ligne);
            $result[$ligne["id"]] = $class;
        }
        
        return $result;
    }





    public function CountAlCat($categorie) {
        $sql ="SELECT COUNT(`id`) AS 'nb' FROM `{$this->table}` WHERE `categorie`=:categorie and `online`= 1";
        $param = [":categorie"=>$categorie];
        $req = BDDselect($sql, $param);
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        if($ligne === false){
            return 0;
        }else{
            return $ligne["nb"];
        }
    }
      

      


    public function serachbylocation($location, $premier,$parpage){
        //role charger l'objet par pk
        //paramtes $pk - cles primaires
        //retour  true si reusiit false sinon
        $sql = "SELECT * FROM `{$this->table}` WHERE `location`=:location ORDER BY `id` DESC LIMIT $premier, $parpage;";
        $param = [":location"=>$location];
        $req = BDDselect($sql, $param);
        
        //tableu vide
        $result = [];
        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)){
            $event = new events();
            $event->setFromTab($ligne);
            $result[$ligne["id"]] = $event;
        }
        
        return $result;
    }



    
    public function CountByLocattion($location) {
        $sql ="SELECT COUNT(`id`) AS 'nb' FROM `{$this->table}` WHERE `location`=:location";
        $param = [":location"=>$location];
        $req = BDDselect($sql, $param);
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        if($ligne === false){
            return 0;
        }else{
            return $ligne["nb"];
        }
    }





    public function serachbydate($date, $premier,$parpage){
        //role charger l'objet par pk
        //paramtes $pk - cles primaires
        //retour  true si reusiit false sinon
        $sql = "SELECT * FROM `{$this->table}` WHERE `date`=:date ORDER BY `id` DESC LIMIT $premier, $parpage;";
        $param = [":date"=>$date];
        $req = BDDselect($sql, $param);
        
        //tableu vide
        $result = [];
        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)){
            $event = new events();
            $event->setFromTab($ligne);
            $result[$ligne["id"]] = $event;
        }
        
        return $result;
    }



    
    public function CountByDate($date) {
        $sql ="SELECT COUNT(`id`) AS 'nb' FROM `{$this->table}` WHERE `date`=:date";
        $param = [":date"=>$date];
        $req = BDDselect($sql, $param);
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        if($ligne === false){
            return 0;
        }else{
            return $ligne["nb"];
        }
    }




    public function serachFilter($location,$categorie,$date, $premier,$parpage){
        //role charger l'objet par pk
        //paramtes $pk - cles primaires
        //retour  true si reusiit false sinon

        if($location and !$date and  !$categorie){
            $sql = "SELECT * FROM `{$this->table}` WHERE `location`=:location AND `online`=1 ORDER BY `id` DESC LIMIT $premier, $parpage;";
            $param = [":location"=>$location];
            
        }elseif($location and $categorie and !$date){
            $sql = "SELECT * FROM `{$this->table}` WHERE  `location`=:location AND `categorie`=:categorie AND `online`=1  ORDER BY `id` DESC LIMIT $premier, $parpage;";
            $param = [":location"=>$location,":categorie"=>$categorie];
          
        }elseif($location and $date and !$categorie){
            $sql = "SELECT * FROM `{$this->table}` WHERE `date`=:date AND `location`=:location AND `online`=1  ORDER BY `id` DESC LIMIT $premier, $parpage;";
            $param = [":location"=>$location,":date"=>$date];
        
        }else if($location and $categorie and $date){
            $sql = "SELECT * FROM `{$this->table}` WHERE `date`=:date AND `location`=:location AND `categorie`=:categorie AND `online`=1 ORDER BY `id` DESC LIMIT $premier, $parpage;";
            $param = [":location"=>$location,":categorie"=>$categorie, ":date"=>$date];
        }elseif($categorie and !$date and !$location){
            $sql = "SELECT * FROM `{$this->table}` WHERE `categorie`=:categorie AND `online`=1 ORDER BY `id` DESC LIMIT $premier, $parpage;";
            $param = [":categorie"=>$categorie];
        }elseif($date and !$categorie and !$location){
            $sql = "SELECT * FROM `{$this->table}`WHERE `date`=:date AND `online`=1 ORDER BY `id` DESC LIMIT $premier, $parpage;";
            $param = [":date"=>$date];
           
        }elseif($categorie and $date and !$location){
            $sql = "SELECT * FROM `{$this->table}` WHERE `date`=:date AND `categorie`=:categorie AND `online`=1  ORDER BY `id` DESC LIMIT $premier, $parpage;";
            $param = [":categorie"=>$categorie,":date"=>$date];
           
        }
       
       
        $req = BDDselect($sql, $param);
        
        //tableu vide
        $result = [];
        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)){
            $event = new events();
            $event->setFromTab($ligne);
            $result[$ligne["id"]] = $event;
        }
        
        return $result;
    }



    
    public function CountFilter($location,$categorie,$date) {

        if($location and !$date and  !$categorie){
            $sql ="SELECT COUNT(`id`) AS 'nb' FROM `{$this->table}` WHERE  `location`=:location";
            $param = [":location"=>$location];
            
        }elseif($location and $categorie and !$date){

            $sql ="SELECT COUNT(`id`) AS 'nb' FROM `{$this->table}` WHERE `location`=:location AND `categorie`=:categorie AND `online`=1";
            
            $param = [":location"=>$location,":categorie"=>$categorie];
          
        }elseif($location and $date and !$categorie){
            $sql ="SELECT COUNT(`id`) AS 'nb' FROM `{$this->table}` WHERE  `date`=:date AND `location`=:location AND `online`=1";
           
            $param = [":location"=>$location,":date"=>$date];
        
        }else if($location and $categorie and $date){
            $sql ="SELECT COUNT(`id`) AS 'nb' FROM `{$this->table}` WHERE `date`=:date AND `location`=:location AND `categorie`=:categorie AND `online`=1";
            $param = [":location"=>$location,":categorie"=>$categorie, ":date"=>$date];

        }elseif($categorie and !$date and !$location){
            $sql ="SELECT COUNT(`id`) AS 'nb' FROM `{$this->table}`  WHERE `categorie`=:categorie AND `online`=1";
         
            $param = [":categorie"=>$categorie];
        }elseif($date and !$categorie and !$location){
            $sql ="SELECT COUNT(`id`) AS 'nb' FROM `{$this->table}` WHERE `date`=:date AND `online`=1";
           
            $param = [":date"=>$date];
        }elseif($categorie and $date and !$location){
            $sql ="SELECT COUNT(`id`) AS 'nb' FROM `{$this->table}` WHERE `date`=:date AND `categorie`=:categorie AND `online`=1";
         
            $param = [":categorie"=>$categorie,":date"=>$date];
        }
       
       
        $req = BDDselect($sql, $param);
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        if($ligne === false){
            return 0;
        }else{
            return $ligne["nb"];
           
        }
    }
    


    
}





    
    
    
    


<?php

/*
 Class mere 
 * 
 * Description of principal
 *
 * @author élève
 */
class principal {
    protected $pk; //Cles primair
    protected $table;  //table du classe
    protected $champs = [];   //les champs du table
    protected $values =[];    //les valurs;
    protected $liens = [];   //les liens  ex = ["user"=>"user"]
    protected $liensValeurs =[];   //les valures du liens 
    //protected $forms =[];          //les forms du table du class




    public function __construct($pk = null) {
        //role charger l'objet par id apres avoir ecrire new
        //paramtre $pk -> cles primaires
        //retour l'objet charger
        if(!is_null($pk)){
            $this->loadByPk($pk);
        }
    }
    
     public function get($champ){
        //role 
        //paramtres $champ nom du champ
        //retour
        if(!in_array($champ, $this->champs)){
            echo "Errore champ $champ a ete pas trouve";
            return "";
        }
        //les liens
        if(isset($this->liens[$champ])){
            if(!isset($this->liensValeurs[$champ])){
                $class = $this->liens[$champ];
                $this->liensValeurs[$champ] = new $class($this->values[$champ]);
                
            }
            return $this->liensValeurs[$champ];
        }
        
        if(isset($this->values[$champ])){
            return $this->values[$champ];
        }else{
            return "";
        }
    }




    public function set($champ, $val){
        //role initialiser  et modifier l'objet
        //Paramtres $champ nom du chapm, $val = vamiers
        //retour true ou false
        
        if(!in_array($champ, $this->champs)){
            echo "Champ $champ na ete pas trouvé";
            return false;
        }
        $this->values[$champ] = $val;
        return true;
    }
    
    
    
    public function loadByPk($pk){
        //role charger l'objet par pk
        //paramtes $pk - cles primaires
        //retour  true si reusiit false sinon
        $sql = "SELECT * FROM `{$this->table}` WHERE `{$this->pk}`=:pk";
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
    
    
    public function setFromTab($tab){
        //role charger l'objet abvec pluisirs attributs
        //paramtres $tab - tabl
        //retour true ou false
        foreach ($this->champs as $champ){
            if(isset($tab["$champ"])){
                $this->set($champ, $tab["$champ"]);
            }
        }
        return true;
    }
    
    
    

    
    
    
    public function insert(){
        //role inseret dans le base de donnes
        //paramtres non
        //retour true ou false
        $sql = "INSERT INTO `{$this->table}` SET ";
        $set = [];
        $param = [];
        foreach ($this->champs as $champ){
            if($champ !== "id" AND $champ !=="technicien" AND $champ !=="date_message" ){
                $set[]= "`$champ`=:$champ";
                $param[":$champ"] = $this->values[$champ];
            }
            
        }
        $sql .= implode(",", $set);
        if(BDDquery($sql, $param)===1){
            $this->values[$this->pk]= BDDlastId();
            return true;
        }else{
            echo "Erorre d'insertion " . get_class($this);
            return false;
        }
        
    }
    
    
    public function update(){
        //role metre a jour 
        //paramtres non
        //retour true ou false
        $sql = "UPDATE `{$this->table}` SET ";
        $set = [];
        $param = [];
        foreach ($this->champs as $champ){
            $set[]= "`$champ`=:$champ";
            $param[":$champ"] = $this->values[$champ];
        }
        $sql .= implode(",", $set);
        $sql .= " WHERE `{$this->pk}`=:pk";
        $param[":pk"]=$this->values[$this->pk];
        if(BDDselect($sql, $param)!==-1){
            return true;
        }else{
            echo "Errore de modification " . get_class($this);
            return false;
        }
    }
    
    
    public function delete(){
        //Role suprimer dans le base de donnes
        //paramtres non
        //retour true ou false
        $sql ="DELETE FROM `{$this->table}` WHERE `{$this->pk}`=:pk";
        $param =[":pk"=> $this->values[$this->pk]];
        if(BDDquery($sql, $param)!==-1){
            return true;
        } else {
            echo "Errore de suprimation " . get_class($this);
            return false;
        }
    }
    
    
    public function liste(){
        //Role affiche le liste 
        //paramtres $limite nb de limite dans le requete
        //retour tableu de result
        
        //definir les class
        $class = get_class($this);
        
        $sql ="SELECT * FROM `{$this->table}`";
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
    
}
